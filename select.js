$('.hide').hide();

$('#productType').change(function () {
    $('.hide').hide();
    $('#' + this.value).show();
    $('.hide input').attr('disabled','disabled');
    $('#' + this.value + ' input').removeAttr('disabled');

});


function removeCheckedCheckboxes() {
    var checked = document.querySelectorAll(".delete-checkbox:checked");
    checked.forEach((elem) => {
      elem.parentElement.style.display = "none";
    })
}
