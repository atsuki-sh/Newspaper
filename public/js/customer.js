$('#new').click(function () {
    $('.post-data').val('');

    $('#submit').parent().data('id', 0);
})

$(document).on('hidden.bs.modal', '#exampleModal', function () {
    $('#error-messages').addClass('d-none');
    $('.form-control').removeClass('is-invalid');
});

$('#search').click(function () {
    window.ajax_post_load($(this).data('url'), '#customer-list', {'word': $('#input-search').val()});
});

$('#reset').click(function () {
    $('#input-search').val('');
    window.ajax_get_load($(this).data('url'), '#customer-list');
});

$(document).on('click', '.change', function () {
    window.ajax_get_load($(this).data('url'), '#exampleModal');
    $('#exampleModal').modal('show');
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

    const id = $(this).parent().data('id');
    post_data['item[id]'] = id;

    const then = function (res) {
        window.ajax_get_load($('#customer-list').data('url'), '#customer-list');
        $('#exampleModal').modal('hide');
    };

    const fail = function (xhr, textStatus, errorThrow) {
        console.log(xhr.responseJSON.errors);
        console.log(errorThrow);

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
    };

    if (id === 0)
    {
        window.ajax_post($(this).parent().data('url-create'), post_data, then, fail);
    }
    else
    {
        window.ajax_post($(this).parent().data('url-update'), post_data, then, fail);
    }
});

$(document).on('click', '.delete', function () {
    const name = $(this).data('name');

    const then = function (res) {
        window.ajax_get_load($('#customer-list').data('url'), '#customer-list');
    }

    const fail = function (xhr, textStatus, errorThrow) {
        console.log(xhr.responseJSON.errors);
        console.log(errorThrow);
    };

    if (confirm(`顧客「${name}」を削除しますか？`)) {
        window.ajax_post($(this).data('url'),{'id': $(this).data('id')}, then, fail);
    }
});
