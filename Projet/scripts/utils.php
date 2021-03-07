<?php

//--------------------------------------------------------------------------------------------------
// Utilities for our event-fetching scripts.
//
// Requires PHP 5.2.0 or higher.
//--------------------------------------------------------------------------------------------------

// PHP will fatal error if we attempt to use the DateTime class without this being set.
date_default_timezone_set('Europe/Paris');

class Event
{

  // Tests whether the given ISO8601 string has a time-of-day or not
  const ALL_DAY_REGEX = '/^\d{4}-\d\d-\d\d$/'; // matches strings like "2013-12-29"

  public $title;
  public $allDay; // a boolean
  public $start; // a DateTime
  public $end; // a DateTime, or null
  public $properties = array(); // an array of other misc properties


  // Constructs an Event object from the given array of key=>values.
  // You can optionally force the timeZone of the parsed dates.
  public function __construct($array, $timeZone = null)
  {
    $this->title = $array['title'];

    if (isset($array['allDay'])) {
      // allDay has been explicitly specified
      $this->allDay = (bool)$array['allDay'];
    } else {
      // Guess allDay based off of ISO8601 date strings
      $this->allDay = preg_match(self::ALL_DAY_REGEX, $array['start']) &&
        (!isset($array['end']) || preg_match(self::ALL_DAY_REGEX, $array['end']));
    }

    if ($this->allDay) {
      // If dates are allDay, we want to parse them in UTC to avoid DST issues.
      $timeZone = null;
    }

    // Parse dates
    $this->start = parseDateTime($array['start'], $timeZone);
    $this->end = isset($array['end']) ? parseDateTime($array['end'], $timeZone) : null;

    // Record misc properties
    foreach ($array as $name => $value) {
      if (!in_array($name, array('title', 'allDay', 'start', 'end'))) {
        $this->properties[$name] = $value;
      }
    }
  }


  // Returns whether the date range of our event intersects with the given all-day range.
  // $rangeStart and $rangeEnd are assumed to be dates in UTC with 00:00:00 time.
  public function isWithinDayRange($rangeStart, $rangeEnd)
  {

    // Normalize our event's dates for comparison with the all-day range.
    $eventStart = stripTime($this->start);

    if (isset($this->end)) {
      $eventEnd = stripTime($this->end); // normalize
    } else {
      $eventEnd = $eventStart; // consider this a zero-duration event
    }

    // Check if the two whole-day ranges intersect.
    return $eventStart < $rangeEnd && $eventEnd >= $rangeStart;
  }


  // Converts this Event object back to a plain data array, to be used for generating JSON
  public function toArray()
  {

    // Start with the misc properties (don't worry, PHP won't affect the original array)
    $array = $this->properties;

    $array['title'] = $this->title;

    // Figure out the date format. This essentially encodes allDay into the date string.
    if ($this->allDay) {
      $format = 'Y-m-d'; // output like "2013-12-29"
    } else {
      $format = 'c'; // full ISO8601 output, like "2013-12-29T09:00:00+08:00"
    }

    // Serialize dates into strings
    $array['start'] = $this->start->format($format);
    if (isset($this->end)) {
      $array['end'] = $this->end->format($format);
    }

    return $array;
  }

  public function __toString(){
    return $this->title." du ".date_format($this->start, 'Y-m-d H:i:s');
  }

  public static function getEvenement($dbh, $id)
  {
    $query = "SELECT * FROM `evenements` WHERE `id`=?";
    $sth = $dbh->prepare($query);
    $sth->execute(array($id));
    $array = $sth->fetch();
    $sth->closeCursor();
    if ($array == null) {
      return false;
    }
    $event = new Event($array);
    return $event;
  }

  public static function getAllEvenementTable($dbh)
  {
    $query = "SELECT `id`, COUNT(`id_event`)  FROM `evenements` LEFT join inscription on `id`=`id_event` group by `id`";
    $sth = $dbh->prepare($query);
    $sth->setFetchMode();
    $sth->execute();
    $array1 = array();
    $arrayEvent = array();
    while ($toto = $sth->fetch()) {
      //$arrayEvent[] = new Event($toto);
      $id = $toto[0];
      $nb = $toto[1];
      $event = Event::getEvenement($dbh, $id);
      $lieu = $event->properties["lieu"];
      $date = $event->start->format('Y-m-d');
      $start =  $event->start->format('H:i');
      $end =  $event->end->format('H:i');
      $desc = $event->properties["description"];
      $array1[] = array("id" => $id, "nom" => $event->title, "date" => $date, "start" => $start, "end" => $end, "lieu" => $lieu, "nb" => $nb, "dec" => $desc);
    }
    $array2 = array();
    $array2["data"] = $array1;
    $json1 = json_encode($array2);
    return $array2;
    //file_put_contents("json/table.json", $json1);
  }
  public static function getAllEvenementCall($dbh){
    $query = "SELECT * FROM `evenements` order by  'start', 'end'";
    $sth = $dbh->prepare($query);
    $sth->setFetchMode();
    $sth->execute();
    $array3 = array();
    $array3 = $sth->fetchAll();
    $json1 = json_encode($array3);
    //file_put_contents("json/myfile.json", $json1);
    return $array3;
  }

  public static function getInscritsEvent($dbh,$id){
    $query = 'SELECT * FROM `utilisateurs` JOIN `inscription` on `login`=`id_eleve` WHERE `id_event`="'.$id.'"';
    $event = Event::getEvenement($dbh, $id);
    $sth = $dbh->prepare($query);
    $sth->setFetchMode();
    $sth->execute();
    $array3 = array();
    $array3 = $sth->fetchAll();
    $array2 = array();
    $array2["data"] = $array3;
    return $array2;
  }

  public static function getEventsnonadmin($dbh, $id){
    $query = 'SELECT `id_event`, `id_eleve`  FROM `evenements` JOIN `inscription` on `id`=`id_event` WHERE `id_eleve`="'.$id.'"';
    $sth = $dbh->prepare($query);
    $sth->setFetchMode();
    $sth->execute();
    $array1 = array();
    $arrayEvent = array();
    while ($toto = $sth->fetch()) {
      //$arrayEvent[] = new Event($toto);
      $id = $toto[0];
      $id_eleve = $toto[1];
      $event = Event::getEvenement($dbh, $id);
      $lieu = $event->properties["lieu"];
      $date = $event->start->format('Y-m-d');
      $start =  $event->start->format('H:i');
      $end =  $event->end->format('H:i');
      $desc = $event->properties["description"];
      $array1[] = array("id" => $id, "nom" => $event->title, "date" => $date, "start" => $start, "end" => $end, "lieu" => $lieu, "id_eleve" => $id_eleve, "dec" => $desc, );
    }
    $array2 = array();
    $array2["data"] = $array1;
    $json1 = json_encode($array2);
    return $array2;
  }

  public static function insererEvenement($dbh, $id, $title, $start, $end, $description, $categorie, $lieu)
  {
    $sth = $dbh->prepare("INSERT INTO `evenements` (`id`,`title`, `start`, `end`, `description`, `categorie`, `lieu`) VALUES(?,?,?,?,?,?,?)");
    if (Event::getEvenement($dbh, $id) == null) {
      $sth->execute(array($id, $title, $start->format('Y-m-d H:i:s'), $end->format('Y-m-d H:i:s'), $description, $categorie, $lieu));
      return true;
    }
    return false;
  }

  public static function changeDate($dbh, $id, $newStart, $newEnd)
  {
    $query = "UPDATE `evenements` SET `start`=? ; SET `end`=? WHERE `id`=?";
    $sth = $dbh->prepare($query);
    if (Utilisateur::getUtilisateur($dbh, $id) != null) {
      $sth->execute(array($newStart, $newEnd, $id));
      return true;
    }
    return false;
  }

  public static function deleteEvent($dbh, $id, $suppr)
  {
    $query = "DELETE FROM `evenements` WHERE `id`=?";
    $sth = $dbh->prepare($query);
    if (Event::getEvenement($dbh, $id) != false) {
      $sth->execute(array($id));
    } else return false;
    if ($suppr) return true;
    $query = "DELETE FROM `inscription` WHERE `id_event`=?";
    $sth = $dbh->prepare($query);
    $sth->execute(array($id));
    return true;
  }
}

// Date Utilities
//----------------------------------------------------------------------------------------------


// Parses a string into a DateTime object, optionally forced into the given timeZone.
function parseDateTime($string, $timeZone = null)
{
  $date = new DateTime(
    $string,
    $timeZone ? $timeZone : new DateTimeZone('Europe/Paris')
    // Used only when the string is ambiguous.
    // Ignored if string has a timeZone offset in it.
  );
  if ($timeZone) {
    // If our timeZone was ignored above, force it.
    $date->setTimezone($timeZone);
  }
  return $date;
}


// Takes the year/month/date values of the given DateTime and converts them to a new DateTime,
// but in UTC.
function stripTime($datetime)
{
  return new DateTime($datetime->format('Y-m-d'));
}
