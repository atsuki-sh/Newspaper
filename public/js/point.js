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

$(document).on('click', '.registration', function () {
    // 開いているポイントのIDと選択した顧客のIDを送信
    const data = {
        point_id: $('#customerModalLabel').data('id'),
        customer_id: $(this).data('customer_id'),
    }
    const addDone = function () {
        window.ajax_get_load($('#point-list').data('url'), '#point-list');
    }
    window.ajax_post_load($(this).data('url'), '#customerModal', data, addDone);
});

$(document).on('click', '.customer-delete', function () {
    const data = {
        point_id: $('#customerModalLabel').data('id'),
        customer_id: $(this).data('customer_id'),
    }
    const addDone = function () {
        window.ajax_get_load($('#point-list').data('url'), '#point-list');
    }
    window.ajax_post_load($(this).data('url'), '#customerModal', data, addDone);
});
