// ラジオボタンが押されたとき
$('.radio').click(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'post',
        url: 'user/',
        data: {'item[radio]': $("input[name='user_radio']:checked").val()},
    })
        .then((res) => {
            $('#user-list').html(res);
        })
});

// 「新規登録」が押されたとき
$('#new').click(function () {
    // モーダルの値をクリア
    $('.post-data').val('');
    $('#input-admin').val(0);
    $('.phone').val('');

    // modal-bodyのidに0をセット
    $('.modal-body').data('id', 0);

    // 新規登録はパスワードが必須なので、チェックボックスはcheckedかつdisabled
    $('#checkbox-password').prop('checked', true);
    $('#checkbox-password').prop('disabled', true);
    $('.passwords').prop('disabled', false);
});

// 「変更」が押されたとき
$(document).on( 'click', '.change', function () {
    // tdにセットされているデータを取得
    const id = $(this).parent().data('id');
    const name = $(this).parent().data('name');
    const email = $(this).parent().data('email');
    const phone1 = $(this).parent().data('phone1');
    const phone2 = $(this).parent().data('phone2');
    const phone3 = $(this).parent().data('phone3');
    const admin = $(this).parent().data('admin');

    // モーダルにデータを貼る
    $('#input-name').val(name);
    $('#input-email').val(email);
    $('#input-phone1').val(phone1);
    $('#input-phone2').val(phone2);
    $('#input-phone3').val(phone3);
    $('#input-admin').val(admin);

    // modal-bodyにidをセット
    $('.modal-body').data('id', id);
});

// モーダルのチェックボックスが押されたとき
$('#checkbox-password').click(function () {
    if ($(this).prop('checked')) {
        $('.passwords').prop('disabled', false);
    } else {
        $('.passwords').prop('disabled', true).val('');
    }
})

// モーダルが閉じたとき
$('#exampleModal').on('hidden.bs.modal', function () {
    // エラーメッセージエリアを非表示
    $('#error-messages').addClass('d-none');

    // フォームのinvalidを消す
    $('.form-control').removeClass('is-invalid');

    // チェックボックスをuncheckedにし、パスワードフォームをdisabledに
    $('#checkbox-password').prop('checked', false).prop('disabled', false);
    $('.passwords').prop('disabled', true).val('');
});

// 「保存」が押されたとき
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

    // 電話番号は結合してpost_dataに保存
    post_data['item[phone]'] = $('#input-phone1').val() + $('#input-phone2').val() + $('#input-phone3').val();

    // ラジオボタンの状態も保存
    post_data['item[radio]'] = $('input[name="user_radio"]:checked').val();

    // 新規なら0、変更なら対象データのidを.modal-bodyから取得
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
                $('#exampleModal').modal('hide');
                $('#user-list').html(res);
            })
            .fail((xhr, textStatus, errorThrow) => {
                console.log(xhr.responseJSON.errors);
                console.log(errorThrow);

                // エラーメッセージエリアを表示
                $('#error-messages').removeClass('d-none');

                // いったんエラーメッセージとフォームを消去
                $('#error-messages').html('');
                $('.form-control').removeClass('is-invalid');

                // パスワードのvalueも消去
                $('.passwords').val('');

                Object.keys(xhr.responseJSON.errors).forEach(function (key) {
                    // エラーメッセージを表示
                    const message = xhr.responseJSON.errors[key];
                    const messagae_html = `<div>${message}</div>`;
                    $('#error-messages').append(messagae_html);

                    // keyは「item.name」なので「name」となるように整形
                    const data_name = key.slice(5);

                    // エラーの出たinputをinvalid表示
                    if (data_name === 'phone') {
                        $('.phone').addClass('is-invalid');
                    } else {
                        $(`[name='item[${data_name}]']`).addClass('is-invalid');
                    }
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

                $('#error-messages').removeClass('d-none');

                $('#error-messages').html('');
                $('.form-control').removeClass('is-invalid');

                $('.passwords').val('');

                Object.keys(xhr.responseJSON.errors).forEach(function (key) {
                    const message = xhr.responseJSON.errors[key];
                    const messagae_html = `<div>${message}</div>`;
                    $('#error-messages').append(messagae_html);

                    const data_name = key.slice(5);

                    if (data_name === 'phone') {
                        $('.phone').addClass('is-invalid');
                    }
                    $(`[name='item[${data_name}]']`).addClass('is-invalid');
                });
            })

    }
});

// 「削除」が押されたとき
$(document).on('click', '.delete', function () {
    const name = $(this).parent().data('name');

    // confirmで「OK」が押されたらデータを削除する
    if(confirm(`ユーザー「${name}」 を削除しますか？`)) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            url: 'user/delete',
            data: {
                'item[id]': $(this).parent().data('id'),
                'item[radio]': $("input[name='user_radio']:checked").val(),
            }
        })
            .then((res) => {
                $('#user-list').html(res);
            })
            .fail((error) => {
                console.log(error.statusText);
            });

    }
});
