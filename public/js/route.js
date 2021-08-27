$('#new').click(function () {
    $('.post-data').val('');

    $('#submit').data('id', 0);
});

$(document).on('click', '.change', function () {
    const addDone = function () {
        $('#routeModal').modal('show');
    }
    window.ajax_get_load($(this).data('url'), '#routeModal', addDone);
});

$('#btn-search-route').click(function () {
    window.ajax_post_load($(this).data('url'), '#route-list', {word: $('#input-search').val()});
});

$('#btn-reset-route').click(function () {
    $('#input-search').val('');
    window.ajax_get_load($('#route-list').data('url'), '#route-list');
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

    const id = $(this).data('id');
    post_data['item[id]'] = id;

    const addDone = function () {
        window.ajax_get_load($('#route-list').data('url'), '#route-list');
        $('#routeModal').modal('hide');
    }

    const addFail = function (xhr) {
        $('#error-messages').removeClass('d-none');

        $('#error-messages').html('');
        $('.form-control').removeClass('is-invalid');

        const message_html = `<div>${xhr.responseJSON.errors['name']}</div>`;
        $('#error-messages').append(message_html);
    }

    if (id === 0) {
        window.ajax_post_load($(this).data('url-create'), '', post_data, addDone, addFail);
    } else {
        window.ajax_post_load($(this).data('url-update'), '', post_data, addDone, addFail);
    }
});

$(document).on('click', '.route-delete', function () {
    const addDone = function () {
        window.ajax_get_load($('#route-list').data('url'), '#route-list')
    }
    if (confirm(`ルート「${$(this).data('name')}」を本当に削除しますか？`)) {
        window.ajax_post_load($(this).data('url'), '', {'id': $(this).data('id')}, addDone);
    }
});
