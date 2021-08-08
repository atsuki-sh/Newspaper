@extends('layouts.app')

@section('title', "ユーザー管理")

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12 d-flex justify-content-between align-items-center">
                <h3 class="mb-0">ユーザー一覧</h3>
                <div>
                    <input class="form-check-input" type="radio" name="exampleRadios" id="aa" style="transform:scale(1.5);" checked>
                    <label class="form-check-label" for="aa">
                        すべて表示
                    </label>
                </div>
                <div>
                    <input class="form-check-input" type="radio" name="exampleRadios" id="bb" style="transform:scale(1.5);">
                    <label class="form-check-label" for="bb">
                        管理者のみ
                    </label>
                </div>
                <div>
                    <input class="form-check-input" type="radio" name="exampleRadios" id="cc" style="transform:scale(1.5);">
                    <label class="form-check-label" for="cc">
                        一般のみ
                    </label>
                </div>
                <button type="button" class="btn btn-primary btn-lg" id="new" data-toggle="modal" data-target="#exampleModal">新規登録</button>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">名前</th>
                    <th scope="col">メールアドレス</th>
                    <th scope="col">電話番号</th>
                    <th scope="col">権限</th>
                    <th scope="col">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row" class="align-middle">{{ $loop->iteration }}</th>
                        <td class="align-middle">{{ $user->name }}</td>
                        <td class="align-middle">{{ $user->email }}</td>
                        <td class="align-middle">080-6373-0453</td>
                        <td class="align-middle">{{ $user->admin === "0" ? "一般" : "管理者" }}</td>
                        <td class="align-middle" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}" data-admin="{{ $user->admin }}">
                            <button type="button" class="btn btn-success change" data-toggle="modal" data-target="#exampleModal">変更</button>
                            <button type="button" class="btn btn-secondary delete">削除</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

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
                                <label class="input-group-text" for="input-name">名前</label>
                            </div>
                            <input type="text" class="form-control post-data" id="input-name" name="item[name]" aria-label="Username">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="input-email">メールアドレス</label>
                            </div>
                            <input type="text" class="form-control post-data" id="input-email" name="item[email]" aria-label="MailAddress">
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
                        <div class="input-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="checkbox-password" style="transform:scale(1.5);">
                                <label class="form-check-label" for="checkbox-password">
                                    パスワードを変更する
                                </label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="input-password">パスワード</label>
                            </div>
                            <input type="password" class="form-control post-data passwords" id="input-password" name="item[password]" aria-label="Password" disabled>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="input-password-confirm">パスワード（確認）</label>
                            </div>
                            <input type="password" class="form-control post-data passwords" id="input-password-confirm" name="item[password_confirmation]" aria-label="Password_confirmation" disabled>
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
