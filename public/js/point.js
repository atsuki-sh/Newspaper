$(document).on('click', '.customer-info', function () {
    const addDone = function () {
        $('#customerModal').modal('show');
    }

    window.ajax_get_load($(this).data('url'), '#customerModal', addDone);
});

$(document).on('click', '#btn-search-customer', function () {
    const data = {word: $('#input-search-customer').val()};
    window.ajax_post_load($(this).data('url'), '#searched-list', data);
});
