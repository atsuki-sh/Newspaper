@extends('layouts.app')

@section('title', "ユーザー管理")

@section('content')
    <div class="container">
        <div class="row mb-3 justify-content-center">
            <div class="col-md-8 d-flex justify-content-between align-items-center">
                <h3 class="mb-0">ユーザー管理画面</h3>
                <button type="button" class="btn btn-primary btn-lg" id="new" data-toggle="modal" data-target="#exampleModal">新規登録</button>
            </div>
        </div>

        <div class="row justify-content-center" id="user-list">
            <div class="col-md-8">
                <ul class="list-group">
                    <h4 class="mt-3">管理者</h4>
                    @foreach($admin_users as $user)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">{{ $user["name"] }}</h5>
{{--                            userクラスにユーザーのデータを保存--}}
                            <span class="user" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}" data-password="{{ $user->password }}" data-admin="{{ $user->admin }}">
                                <button type="button" class="btn btn-success change" data-toggle="modal" data-target="#exampleModal">変更</button>
                                <button type="button" class="btn btn-secondary delete">削除</button>
                            </span>
                        </li>
                    @endforeach
                    <h4 class="mt-3">一般</h4>
                    @foreach($common_users as $user)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">{{ $user["name"] }}</h5>
                            {{--                            userクラスにユーザーのデータを保存--}}
                            <span class="user" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}" data-password="{{ $user->password }}" data-admin="{{ $user->admin }}">
                                <button type="button" class="btn btn-success change" data-toggle="modal" data-target="#exampleModal">変更</button>
                                <button type="button" class="btn btn-secondary delete">削除</button>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ユーザー登録</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span id="x" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" data-id="">
                        <div class="alert alert-danger d-none" id="error-messages"></div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">名前</span>
                            </div>
                            <input type="text" class="form-control post-data" id="input-name" name="item[name]" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">メールアドレス</span>
                            </div>
                            <input type="text" class="form-control post-data" id="input-email" name="item[email]" aria-label="MailAddress" aria-describedby="basic-addon2">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">パスワード</span>
                            </div>
                            <input type="password" class="form-control post-data" id="input-password" name="item[password]" aria-label="Password" aria-describedby="basic-addon3">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="input-admin">権限</label>
                            </div>
                            <select class="custom-select post-data form-control" id="input-admin" name="item[admin]">
                                <option value="0" selected>一般</option>
                                <option value="1">管理者</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="submit">保存</button>
                        <button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">閉じる</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src={{ asset('js/user.js') }}></script>
@endsection
