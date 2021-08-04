@extends('layouts.app')

@section('title', "ユーザー管理")

@section('content')
    <div class="container">
        <div class="row mb-3 justify-content-center">
            <div class="col-md-8 d-flex justify-content-between align-items-center">
                <h3>ユーザー管理画面</h3>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal">新規登録</button>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="list-group">
                    @foreach($users as $user)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">{{ $user["name"] }}</h5>
                            <span>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">変更</button>
                            <button type="button" class="btn btn-secondary">削除</button>
                        </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ユーザー登録</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">名前</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">メールアドレス</span>
                            </div>
                            <input type="text" class="form-control" aria-label="MailAddress" aria-describedby="basic-addon2">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">パスワード</span>
                            </div>
                            <input type="password" class="form-control" aria-label="Password" aria-describedby="basic-addon3">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">権限</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01">
                                <option value="0" selected>一般</option>
                                <option value="1">管理者</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                        <button type="button" class="btn btn-primary">保存</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
