$(document).ready(function() {
    $('input[type=radio][name=asegurado]').change(function() {
        if (this.value == 'Si') {
            $('#selectDiv').show();
        }
        else if (this.value == 'No') {
            $('#selectDiv').hide();
        }
    });
});