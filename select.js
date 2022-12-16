$('.hide').hide();

$('#productType').change(function () {
    $('.hide').hide();
    $('#' + this.value).show();
    $('.hide input').attr('disabled','disabled');
    $('#' + this.value + ' input').removeAttr('disabled');

});
