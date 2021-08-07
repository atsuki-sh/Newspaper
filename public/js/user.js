// 変更を押されたとき
$(document).on( 'click', '.change', function () {
    // .userにセットされているデータを取得
    const name = $(this).parent().data('name');
    const email = $(this).parent().data('email');
    const admin = $(this).parent().data('admin');

    // モーダルにデータを貼る
    $('#input-name').val(name);
    $('#input-email').val(email);
    $('#input-admin').val(admin);

    // modal-bodyにidをセット
    const id = $(this).parent().data('id')
    $('.modal-body').data('id', id);
});

// 新規登録ボタンを押されたとき
$('#new').click(function () {
    // モーダルの値をクリア
    $('#input-name').val('');
    $('#input-email').val('');
    $('#input-password').val('');
    $('#input-password-confirm').val('');
    $('#input-admin').val(0);

    // modal-bodyのidに0をセット
    $('.modal-body').data('id', 0);
});

// モーダルが閉じた時の処理
$('#exampleModal').on('hidden.bs.modal', function () {
    // エラーメッセージエリアを非表示
    $('#error-messages').addClass('d-none');

    // フォームのinvalidを消す
    $('.form-control').removeClass('is-invalid');

    // チェックボックスをuncheckedにし、パスワードフォームをdisabledに
    $('#checkbox-password').prop('checked', false);
    $('.passwords').prop('disabled', true);
});

// モーダルのチェックボックスを押されたとき
$('#checkbox-password').click(function () {
    if ($(this).prop('checked')) {
        $('.passwords').prop('disabled', false);
    } else {
        $('.passwords').prop('disabled', true);
    }
})

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

    // 新規なら0、変更なら対象データのidを.modal-bodyに埋め込む
    const id = $('.modal-body').data('id');
    post_data['item[id]'] = id;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // idが0ならcreate
    if (id === 0) {
        $.ajax({
            type: 'post',
            url: 'user/create',
            data: post_data,
        })
            .then((res) => {
                // モーダルを閉じて一覧を更新
                $('#exampleModal').modal('hide');
                $('#user-list').html(res);
            })
            .fail((xhr, textStatus, errorThrow) => {
                console.log(xhr.responseJSON.errors);
                console.log(errorThrow);

                // エラーメッセージエリアを表示
                $('#error-messages').removeClass('d-none');

                // いったんエラーメッセージとフォームをクリア
                $('#error-messages').html('');
                $('.form-control').removeClass('is-invalid');

                Object.keys(xhr.responseJSON.errors).forEach(function (key) {
                    // エラーメッセージを表示
                    const message = xhr.responseJSON.errors[key];
                    const messagae_html = `<div>${message}</div>`;
                    $('#error-messages').append(messagae_html);

                    // エラーの出たinputをinvalid表示
                    $(`[name='${key}']`).addClass('is-invalid');
                });
            })

    }

    // idが0でないならupdate
    else {
        $.ajax({
            type: 'post',
            url: 'user/update',
            data: post_data,
        })
            .then((res) => {
                $('#exampleModal').modal('hide');
                $('#user-list').html(res);
            })
            .fail((xhr, textStatus, errorThrow) => {
                console.log(xhr.responseJSON.errors);
                console.log(errorThrow);

                // エラーメッセージエリアを表示
                $('#error-messages').removeClass('d-none');

                // いったんエラーメッセージとフォームをクリア
                $('#error-messages').html('');
                $('.form-control').removeClass('is-invalid');

                Object.keys(xhr.responseJSON.errors).forEach(function (key) {
                    // エラーメッセージを表示
                    const message = xhr.responseJSON.errors[key];
                    const messagae_html = `<div>${message}</div>`;
                    $('#error-messages').append(messagae_html);

                    // エラーの出たinputをinvalid表示
                    $(`[name='${key}']`).addClass('is-invalid');
                });
            })

    }
});

// 削除の処理
$(document).on('click', '.delete', function () {
    // confirmで「OK」が押されたら、データを削除する
    const name = $(this).parent().data('name');

    if(confirm(`ユーザー「${name}」 を削除しますか？`)) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            url: 'user/delete',
            data: {id: $(this).parent().data('id')}
        })
            .then((res) => {
                $('#user-list').html(res);
            })
            .fail((error) => {
                console.log(error.statusText);
            });

    }
});
