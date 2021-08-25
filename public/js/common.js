window.ajax_get_load = function(url, selector, addDone = function () {}, addFail = function () {}) {
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
            addFail();
        });
}

window.ajax_post_load = function(url, selector, data, addDone = function () {}, addFail = function () {}) {
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
            addFail();
        });
}
