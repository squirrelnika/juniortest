$('.hide').hide()

$('#productType').change(function () {
	  var value = this.value;
    $('.hide').hide()
    $('#' + this.value).show();
});