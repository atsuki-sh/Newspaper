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
});

// 新規登録ボタンを押されたとき
$('#new').click(function () {
    $('#input-name').val('');
    $('#input-email').val('');
    $('#input-pass').val('');
    $('#input-admin').val(0);
});

// 新規登録の処理
$('#submit').click(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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

            $.ajax({
                //GET通信
                type: 'get',
                //ここでデータの送信先URLを指定します。
                url: 'user',
            })

                .then((res) => {
                    console.log('OK!');
                })

        })
        //通信が失敗したとき
        .fail((error) => {
            console.log(error.statusText);
        });
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
