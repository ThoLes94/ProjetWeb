$(document).ready(function() {
    var uploadField = $("#file");

    uploadField.on('change', function() {
        console.log("bonjour");
        console.log(this.files[0].size);
        var taille = 0;
        for (var i = 0; i < this.files.length; i++) {
            taille += this.files[i].size;
        }
        console.log(taille);
        if (taille > 41943040) {
            alert("File is too big!");
            this.value = "";
        };
    });
})