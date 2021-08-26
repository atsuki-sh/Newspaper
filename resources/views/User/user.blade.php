@extends('layouts.app')

@section('title', "ユーザー管理")

@section('content')
    <div class="container">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h3 class="mb-0">ユーザー一覧</h3>
            <button type="button" class="btn btn-primary btn-lg text-nowrap" id="new" data-toggle="modal" data-target="#userModal">新規登録</button>
        </div>

        <div class="mb-3 d-flex justify-content-between ml-4">
            <div class="d-flex w-50 justify-content-between align-items-center">
                <div>
                    <input class="form-check-input radio" type="radio" name="user_radio" id="user_all"
                           data-url="{{ route('user_list', ['admin'=>100]) }}" value="100" style="transform:scale(1.5);" checked>
                    <label class="form-check-label" for="user_all">
                        すべて表示
                    </label>
                </div>
                <div>
                    <input class="form-check-input radio" type="radio" name="user_radio" id="user_admin"
                           data-url="{{ route('user_list', ['admin'=>1]) }}" value="1" style="transform:scale(1.5);">
                    <label class="form-check-label" for="user_admin">
                        管理者のみ
                    </label>
                </div>
                <div class="mr-3">
                    <input class="form-check-input radio" type="radio" name="user_radio" id="user_common"
                           data-url="{{ route('user_list', ['admin'=>0]) }}" value="0" style="transform:scale(1.5);">
                    <label class="form-check-label" for="user_common">
                        一般のみ
                    </label>
                </div>
            </div>
            <div class="d-flex flex-fill align-items-center">
                <label for="input-search" class="sr-only">名前など</label>
                <input type="text" class="form-control mr-1 ml-auto w-75 text-nowrap" id="input-search" placeholder="名前・メールアドレス・携帯電話番号">
                <button type="button" class="btn btn-primary text-nowrap" id="btn-search" data-url="{{ route('search_user') }}">検索</button>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">名前</th>
                    <th scope="col">メールアドレス</th>
                    <th scope="col">携帯電話番号</th>
                    <th scope="col">権限</th>
                    <th scope="col">最終更新者</th>
                    <th scope="col">操作</th>
                </tr>
            </thead>
            <tbody id="user-list">
                @include('User/user_list_item', ['users' => $users])
            </tbody>
        </table>

        <div class="m-auto">
{{--            {{ $users->links() }}--}}
        </div>

        {{-- モーダル --}}
        <div class="modal fade" id="userModal" tabindex="-1" data-backdrop="static" aria-labelledby="userModalLabel" aria-hidden="true">
            @include('User/user_modal_item', ['user' => $users[0]])
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#nav-user').addClass('active');
    </script>
    <script src={{ asset('js/common.js') }}></script>
    <script src={{ asset('js/user.js') }}></script>
@endsection
