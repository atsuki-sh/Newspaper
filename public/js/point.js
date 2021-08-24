$(document).on('click', '.customer-info', function () {
    const addDone = function () {
        $('#customerModal').modal('show');
    }

    window.ajax_get_load($(this).data('url'), '#customerModal', addDone);
});
