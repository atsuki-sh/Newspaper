$('#btn-search-point').click(function () {
    const data = {word: $('#input-search').val()}
    window.ajax_post_load($(this).data('url'), '#point-list', data);
});

$('#btn-search-reset').click(function () {
    $('#input-search').val('');
    window.ajax_get_load($('#point-list').data('url'), '#point-list');
});

$(document).on('click', '.point-delete', function () {
    const name = $(this).data('name');
    const done = function () {
        window.ajax_get_load($('#point-list').data('url'), '#point-list');
    }
    if (confirm(`ポイント「${name}」を削除しますか？`)) {
        window.ajax_post_load($(this).data('url'), '', done);
    }
})

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

$(document).on('click', '.registration, .customer-delete', function () {
    // 開いているポイントのIDと選択した顧客のIDを送信
    const data = {
        point_id: $('#customerModalLabel').data('id'),
        customer_id: $(this).data('customer-id'),
    }
    const addDone = function () {
        window.ajax_get_load($('#point-list').data('url'), '#point-list');
    }
    window.ajax_post_load($(this).data('url'), '#customerModal', data, addDone);
});

$(document).on('click', '.change', function () {
    const done = function () {
        $('#pointModal').modal('show');
    }
    window.ajax_get_load($(this).data('url'), '#pointModal', done);
})
