$(document).ready(function() {
    var uploadField = document.getElementById("file");

    uploadField.onchange = function() {
        if (this.files[0].size > 307200) {
            alert("File is too big!");
            this.value = "";
        };
    };
})