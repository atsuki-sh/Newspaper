// ajaxでデータを送信するための関数
function ajax_data_post(url, data, then, fail) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'post',
        url: url,
        data: data,
    })
        .then((res) => then(res))
        .fail((xhr, textStatus, errorThrow) => fail(xhr, textStatus, errorThrow))
}
