// 変更を押されたとき
$('.change').click(function () {
    const name = $(this).parent().data('name');
    const email = $(this).parent().data('email');
    const password = $(this).parent().data('password');
    const admin = $(this).parent().data('admin');

    $('#input-name').val(name);
    $('#input-email').val(email);
    $('#input-password').val(password);
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
    $('#input-password').val('');
    $('#input-admin').val(0);

    // modal-bodyのidを0にセット
    $('.modal-body').data('id', 0);
});

// モーダルが閉じた時の処理
$("#exampleModal").on('hidden.bs.modal', function () {
    // エラーメッセージを閉じる
    $('#error-messages').addClass('d-none');

    // フォームのinvalidを消す
    $('.form-control').removeClass('is-invalid');
});

// 新規・更新の処理
$('#submit').click(function () {
    // 送信するデータをpost_dataにまとめる
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
    console.log(post_data);

    const id = $('.modal-body').data('id');
    post_data['id'] = id;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // idが0ならcreate
    if (id === 0) {
        $.ajax({
            //POST通信
            type: 'post',
            //ここでデータの送信先URLを指定します。
            url: 'user/create',
            data: post_data,
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
                // いったんエラーメッセージとフォームをクリア
                $('#error-messages').html('');
                $('.form-control').removeClass('is-invalid');
                // エラーメッセージとフォームを表示
                Object.keys(xhr.responseJSON.errors).forEach(function (key) {
                    const message = xhr.responseJSON.errors[key];
                    const messagae_html = `<div>${message}</div>`;
                    $('#error-messages').append(messagae_html);

                    // エラーの出たinputをinvalid表示
                    $(`#input-${key}`).addClass('is-invalid');
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
            data: post_data,
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

                    // エラーの出たinputをinvalid表示
                    $(`#input-${key}`).addClass('is-invalid');
                });
            })
    }
});

// 削除の処理
$('.delete').click(function () {
    // confirmで「OK」が押されたら、データを削除する
    const name = $(this).parent().data('name');

    if(confirm(`ユーザー「${name}」 を削除しますか？`)) {
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
    }
});
