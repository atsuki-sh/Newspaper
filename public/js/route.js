$(document).on('click', '.change', function () {
    const addDone = function () {
        $('#routeModal').modal('show');
    }
    window.ajax_get_load($(this).data('url'), '#routeModal', addDone);
});
