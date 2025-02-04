/**
 * Filter each DataTable columns. The plugin add a simple text input at 
 * the top of each columns.
 *
 * TODO : Add the option to choose the type of input (text, select, 
 * range...)
 *
 *  @summary Add a filter input on each DataTable columns
 *  @name DataTables Filters v0.1
 *  @author [Angelo Boursin] (https://github.com/aboursin/datatables.filters)
 *
 *  @example
 *		$(document).ready(function() {
 *		
 *			// Initialize DataTable and active filter plugin
 *			$('#example').DataTable().filtersOn();
 *
 *    } );
 */

$.fn.dataTable.Api.register('filtersOn()', function() {

    var dataTable = this;
    var id = $(dataTable.context[0].nTable).attr('id');
    var state = dataTable.state.loaded();

    // Create the filter header row
    $('#' + id + ' thead').after(
        $('<thead />').addClass('filter').append($('<tr />'))
    );

    // Populate the filter header
    $('#' + id + ' thead th').each(function(index) {
        var searchable = dataTable.context[0].aoColumns[index].bSearchable;
        var searchtype = dataTable.context[0].aoColumns[index].searchtype;

        if (index == 3) {
            var select = $('<select><option label=""></option></select>').addClass('form-control input-sm');
            select.append('<option value="Débutant">Débutant</option>');
            select.append('<option value="Intermédiaire">Intermédiaire</option>');
            select.append('<option value="Fort">Fort</option>');
            $('#' + id + ' .filter tr').append($('<th>').append(select));
        } else {

            // Add input only if current column is searchable
            if (searchable) {

                if (searchtype == "select") {

                    // Select input
                    var select = $('<select><option value=""></option></select>').addClass('form-control input-sm');
                    dataTable.column(index).data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });

                    $('#' + id + ' .filter tr').append($('<th>').append(select));
                } else {
                    // Text input
                    $('#' + id + ' .filter tr').append($('<th>').append($('<input type="text"/>').addClass('form-control input-sm')));
                }
            } else {
                $('#' + id + ' .filter tr').append($('<th>'));
            }
        }
    });

    // Restore filter (only if stateSave)
    if (state) {
        console.log("stateSave:true > Restoring filters...");
        dataTable.columns().eq(0).each(function(index) {
            var colSearch = state.columns[index].search;
            if (colSearch.search) {
                // Restore input value
                $('#' + id + ' .filter input').get(index).value = colSearch.search;
            }
        });
    }

    // Filter input event : filter matching column
    $('#' + id + ' .filter input, #' + id + ' .filter select').each(function(index) {
        if (index >= 2) index++;
        $(this).on('keyup change', function() {
            dataTable.column(index).search(this.value).draw();
        });
    });

    return dataTable;

});

$.fn.dataTable.Api.register('filtersClear()', function() {

    var dataTable = this;
    var id = $(dataTable.context[0].nTable).attr('id');
    var state = dataTable.state.loaded();

    // Clean filters (only if stateSave)
    if (state) {
        console.log("stateSave:true > Clearing filters...");
        $('#' + id + ' .filter input, #' + id + ' .filter select').each(function(index) {
            // Clear input value
            this.value = '';
            // Clear column filter
            dataTable.column(index).search('');
        });

        // Re-draw datatable
        dataTable.draw();
    }

});