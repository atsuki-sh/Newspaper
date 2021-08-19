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

window.ajax_get_load = function(url, selector) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'get',
        url: url,
    })
        .then((res) => {
            $(selector).html(res);
        })
        .fail((xhr, textStatus, errorThrown) => {
            console.log(xhr.responseJSON.errors);
            console.log(errorThrow);
        });
}

window.ajax_post_load = function(url, selector, data) {
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
        .then((res) => {
            $(selector).html(res);
        })
        .fail((xhr, textStatus, errorThrown) => {
            console.log(xhr.responseJSON.errors);
            console.log(errorThrow);
        });
}
