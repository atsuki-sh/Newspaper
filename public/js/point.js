$('#btn-search-point').click(function () {
    const data = {word: $('#input-search').val()}
    window.ajax_post_load($(this).data('url'), '#point-list', data);
});

$('#btn-search-reset').click(function () {
    $('#input-search').val('');
    window.ajax_get_load($('#point-list').data('url'), '#point-list');
});

$(document).on('click', '.change', function () {
    const addDone = function () {
        $('#pointModal').modal('show');
    }

    window.ajax_get_load($(this).data('url'), '#pointModal', addDone);
});

$(document).on('click', '#submit', function () {
    const post_data = {};
    $('.post-data').each(function () {
        const val = $(this).val();
        const name = $(this).attr('name');
        const type = $(this).data('type');

        switch (type) {
            case 'textarea':
                break;
            default:
                post_data[name] = val;
                break;
        }
    });

    post_data['item[id]'] = $(this).data('id');

    const addDone = function () {
        window.ajax_get_load($('#point-list').data('url'), '#point-list');
        $('#pointModal').modal('hide');
    }
    const addFail = function (xhr) {
        $('#error-messages').removeClass('d-none');

        $('#error-messages').html('');
        $('.form-control').removeClass('is-invalid');

        Object.keys(xhr.responseJSON.errors).forEach(function (key) {
            const message = xhr.responseJSON.errors[key];
            const messagae_html = `<div>${message}</div>`;
            $('#error-messages').append(messagae_html);

            const data_name = key.slice(5);

            $(`[name='item[${data_name}]']`).addClass('is-invalid');
        });
    }
    window.ajax_post_load($(this).data('url'), '', post_data, addDone, addFail);
});

$(document).on('click', '.point-delete', function () {
    const done = function () {
        window.ajax_get_load($('#point-list').data('url'), '#point-list');
    }
    if (confirm(`ポイント「${$(this).data('name')}」を削除しますか？`)) {
        window.ajax_post_load($(this).data('url'), '', {'id': $(this).data('id')}, done);
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
