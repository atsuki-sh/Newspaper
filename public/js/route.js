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

$(document).on('hidden.bs.modal', '#routeModal', function () {
    $('#error-messages').addClass('d-none');
    $('.form-control').removeClass('is-invalid');
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
        $('#error-messages').removeClass('d-none').html('');
        $('.form-control').removeClass('is-invalid');

        Object.keys(xhr.responseJSON.errors).forEach(function (key) {
            const message = xhr.responseJSON.errors[key];
            const messagae_html = `<div>${message}</div>`;
            $('#error-messages').append(messagae_html);

            const data_name = key.slice(5);

            $(`[name='item[${data_name}]']`).addClass('is-invalid');
        });
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

$(document).on('click', '.point-info', function () {
    const addDone = function () {
        $('#pointModal').modal('show');
    }

    window.ajax_get_load($(this).data('url'), '#pointModal', addDone);
});

$(document).on('click', '#btn-search-point', function () {
    window.ajax_post_load($(this).data('url'), '#searched-list', {word: $('#input-search-point').val()});
});

$(document).on('click', '.registration, .point-delete', function () {
    const data = {
        route_id: $('#pointModalLabel').data('id'),
        point_id: $(this).data('point-id'),
    }
    const addDone = function () {
        window.ajax_get_load($('#route-list').data('url'), '#route-list');
    }

    window.ajax_post_load($(this).data('url'), '#pointModal', data, addDone);
});
