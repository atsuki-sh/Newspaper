// ajaxでデータを送信するための関数
window.ajax_post = function (url, data, then, fail) {
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

window.ajax_get_load = function(url, selector, addDone = function () {}) {
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
            // 追加の処理があれば実行
            addDone();
        })
        .fail((xhr, textStatus, errorThrown) => {
            console.log(xhr.responseJSON.errors);
            console.log(errorThrow);
        });
}

window.ajax_post_load = function(url, selector, data, addDone = function () {}) {
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
            addDone();
        })
        .fail((xhr, textStatus, errorThrown) => {
            console.log(xhr.responseJSON.errors);
            console.log(errorThrow);
        });
}
