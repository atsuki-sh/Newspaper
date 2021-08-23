// ラジオボタンが押されたとき
$('.radio').click(function () {
    window.ajax_get_load($(this).data('url'), '#user-list');
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
    $('#checkbox-password').prop('checked', true).prop('disabled', true);
    $('.passwords').prop('disabled', false);
});

// 「検索」が押されたとき
$('#btn-search').click(function () {
    const url = $('#input-search').data('url');
    const data = {};
    data['word'] = $('#input-search').val();
    data['radio'] = $('input[name="user_radio"]:checked').val();
    window.ajax_post_load(url, '#user-list', data);
})

// 「変更」が押されたとき
$(document).on( 'click', '.change', function () {
    const addDone = function () {
        $('#exampleModal').modal('show');
    }
    window.ajax_get_load($(this).parent().data('url'), '#exampleModal', addDone);
});

// モーダルのチェックボックスが押されたとき
$(document).on('click', '#checkbox-password', function () {
    if ($(this).prop('checked')) {
        $('.passwords').prop('disabled', false);
    } else {
        $('.passwords').prop('disabled', true).val('');
    }
})

// モーダルが閉じたとき
$(document).on('hidden.bs.modal', '#exampleModal', function () {
    $('#error-messages').addClass('d-none');

    $('.form-control').removeClass('is-invalid');

    // チェックボックスをuncheckedにし、パスワードフォームをdisabledに
    $('#checkbox-password').prop('checked', false).prop('disabled', false);
    $('.passwords').prop('disabled', true).val('');
});

// 「保存」が押されたとき
$(document).on('click', '#submit', function () {
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
    // パスワードを変更するかどうかも保存（updateの場合に使用）
    post_data['item[password_checked]'] = $('#checkbox-password').prop('checked');
    // .modal-bodyからidを取得
    const id = $('.modal-body').data('id');
    post_data['item[id]'] = id;

    // 通信成功時の処理
    const then = function (res) {
        window.ajax_get_load($('input[name="user_radio"]:checked').data('url'), '#user-list');
        $('#exampleModal').modal('hide');
    };

    // 通信失敗時の処理
    const fail = function (xhr, textStatus, errorThrow) {
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
    };

    // idが0ならcreate
    if (id === 0) {
        window.ajax_post(Laravel.urls['create'], post_data, then, fail);
    }

    // idが0でないならupdate
    else {
        window.ajax_post(Laravel.urls['update'], post_data, then, fail);
    }
});

// 「削除」が押されたとき
$(document).on('click', '.delete', function () {
    const name = $(this).parent().data('name');

    // confirmで「OK」が押されたらデータを削除する
    if(confirm(`ユーザー「${name}」 を削除しますか？`)) {
        const post_data = {
            'item[id]': $(this).parent().data('id'),
        }

        const then = function (res) {
            window.ajax_get_load($('input[name="user_radio"]:checked').data('url'), '#user-list');
        };

        const fail = function (xhr, textStatus, errorThrow) {
            console.log(xhr.responseJSON.errors);
            console.log(errorThrow);
        };

        window.ajax_post(Laravel.urls['delete'], post_data, then, fail);
    }
});
