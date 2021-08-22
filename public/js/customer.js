$('#new').click(function () {
    $('.post-data').val('');

    $('#submit').parent().data('id', 0);
})

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

    if (id === 0)
    {
        window.ajax_post_load($(this).parent().data('url-create'), '#customer-list', post_data);
    }
    else
    {
        window.ajax_post_load($(this).parent().data('url-update'),'#customer-list', post_data);
    }
});
