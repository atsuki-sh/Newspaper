@extends('layouts.app')

@section('title', "ユーザー管理")

@section('content')
    <div class="container">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h3 class="mb-0">ユーザー一覧</h3>

            <button type="button" class="btn btn-primary btn-lg" id="new" data-toggle="modal" data-target="#exampleModal">新規登録</button>
        </div>

        <div class="mb-3 d-flex justify-content-between ml-4">
            <div class="d-flex w-50 justify-content-between align-items-center">
                <div>
                    <input class="form-check-input radio" type="radio" name="user_radio" id="user_all" data-url="{{ route('all_user_list') }}" value="0" style="transform:scale(1.5);" checked>
                    <label class="form-check-label" for="user_all">
                        すべて表示
                    </label>
                </div>
                <div>
                    <input class="form-check-input radio" type="radio" name="user_radio" id="user_admin" data-url="{{ route('admin_user_list') }}" value="1" style="transform:scale(1.5);">
                    <label class="form-check-label" for="user_admin">
                        管理者のみ
                    </label>
                </div>
                <div>
                    <input class="form-check-input radio" type="radio" name="user_radio" id="user_common" data-url="{{ route('common_user_list') }}" value="2" style="transform:scale(1.5);">
                    <label class="form-check-label" for="user_common">
                        一般のみ
                    </label>
                </div>
            </div>
            <div class="d-flex w-25 align-items-center">
                <label for="input-search" class="sr-only">名前</label>
{{--                todo 現在チェックしているラジオボタンのリストの中から、ユーザーを検索。nameを引数にせずに、--}}
                <input type="text" class="form-control mr-1 ml-auto w-50" id="input-search" data-url="{{ route('search_user') }}" placeholder="名前">
                <button type="button" id="btn-search" class="btn btn-primary">検索</button>
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

        <!-- Modal -->
        <div class="modal" id="exampleModal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
            @include('User/user_modal_item', ['user' => $users[0]])
        </div>

    </div>
@endsection

@section('script')
    <script>
        $('#nav-user').addClass('active');
        const urls = {
            'index': '{{ route('user_index') }}',
            'create': '{{ route('user_create') }}',
            'update': '{{ route('user_update') }}',
            'delete': '{{ route('user_delete') }}',
        };
        window.Laravel = {};
        window.Laravel.urls = urls;
    </script>
    <script src={{ asset('js/common.js') }}></script>
    <script src={{ asset('js/user.js') }}></script>
@endsection
