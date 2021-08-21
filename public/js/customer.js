$('#new').click(function () {
    $('.post-data').val('');
})

$(document).on('click', '.change', function () {
    window.ajax_get_load($(this).data('url'), '#exampleModal');
    $('#exampleModal').modal('show');
});
