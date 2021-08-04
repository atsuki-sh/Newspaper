// 変更を押されたとき
$('.change').click(function () {
    const name = $(this).parent().data('name');
    const email = $(this).parent().data('email');
    const password = $(this).parent().data('password');
    const admin = $(this).parent().data('admin');

    $('#input-name').val(name);
    $('#input-email').val(email);
    $('#input-pass').val(password);
    $('#input-admin').val(admin);

    // modal-bodyのidを0にセット
    const id = $(this).parent().data('id')
    $('.modal-body').data('id', id);
});

// 新規登録ボタンを押されたとき
$('#new').click(function () {
    // 値をクリア
    $('#input-name').val('');
    $('#input-email').val('');
    $('#input-pass').val('');
    $('#input-admin').val(0);

    // modal-bodyのidを0にセット
    $('.modal-body').data('id', 0);
});

// モーダルが閉じたらエラーメッセージも閉じる
$("#exampleModal").on('hidden.bs.modal', function () {
    $('#error-messages').addClass('d-none');
});

// 新規・更新の処理
$('#submit').click(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const id = $('.modal-body').data('id');
    // idが0ならcreate
    if (id === 0) {
        $.ajax({
            //POST通信
            type: 'post',
            //ここでデータの送信先URLを指定します。
            url: 'user/create',
            data: {
                name: $('#input-name').val(),
                email: $('#input-email').val(),
                password: $('#input-pass').val(),
                admin: $('#input-admin').val(),
            },

        })
            //通信が成功したとき
            .then((res) => {
                console.log(res);
                $('#exampleModal').modal('hide');
            })

            //通信が失敗したとき
            .fail((xhr, textStatus, errorThrow) => {
                console.log(xhr.responseJSON.errors);
                console.log(errorThrow);

                $('#error-messages').removeClass('d-none');

                // バリデーションのエラーメッセージを出力
                $('#error-messages').html('');
                Object.keys(xhr.responseJSON.errors).forEach(function (key) {
                    const message = xhr.responseJSON.errors[key];
                    const messagae_html = `<div>${message}</div>`;
                    $('#error-messages').append(messagae_html);
                });
            })
    }

    // idが0でないならupdate
    else {
        $.ajax({
            //POST通信
            type: 'post',
            //ここでデータの送信先URLを指定します。
            url: 'user/update',
            data: {
                id: id,
                name: $('#input-name').val(),
                email: $('#input-email').val(),
                password: $('#input-pass').val(),
                admin: $('#input-admin').val(),
            },

        })
            //通信が成功したとき
            .then((res) => {
                $('#exampleModal').modal('hide');
            })

            //通信が失敗したとき
            .fail((xhr, textStatus, errorThrow) => {
                console.log(xhr.responseJSON.errors);
                console.log(errorThrow);

                $('#error-messages').removeClass('d-none');

                // バリデーションのエラーメッセージを出力
                $('#error-messages').html('');
                Object.keys(xhr.responseJSON.errors).forEach(function (key) {
                    const message = xhr.responseJSON.errors[key];
                    const messagae_html = `<div>${message}</div>`;
                    $('#error-messages').append(messagae_html);
                });
            })
    }

    // 送信するデータをまとめるやつ
    // var post_data = [];
    // $('.post_data').each(function () {
    //     var val = $(this).val();
    //     var name = $(this).attr('name');
    //     var type = $(this).data('type');
    //
    //     switch (type) {
    //         case 'textarea':
    //             break;
    //         default:
    //             post_data[name] = val;
    //             break;
    //     }
    // });

});

// 削除の処理
$('.delete').click(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        //POST通信
        type: 'post',
        //ここでデータの送信先URLを指定します。
        url: 'user/delete',
        data: {id: $(this).parent().data('id')}
    })
        //通信が成功したとき
        .then((res) => {
            console.log(res);
        })
        //通信が失敗したとき
        .fail((error) => {
            console.log(error.statusText);
        });
});
