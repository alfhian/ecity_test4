$(document).ready(function() {
    $('.jabatan option', '.dept option').addClass('font-size-13');
    $('.jabatan').select2({
        theme: "bootstrap-5",
    });
    $('.department').select2({
        theme: "bootstrap-5",
    });
});