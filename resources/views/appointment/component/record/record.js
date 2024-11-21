$(document).on('click', '.select-date', function () {
    var selectedDate = $(this).data('date');
    $('#selected_date').val(selectedDate);
    $('#date-form').show();
});