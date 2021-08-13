@extends('layouts.app')

@section('title', "ユーザー管理")

@section('content')
    <div class="container">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h3 class="mb-0">ユーザー一覧</h3>
            <div>
                <input class="form-check-input radio" type="radio" name="user_radio" id="user_all" data-url="{{ route('all_user_list') }}" style="transform:scale(1.5);" checked>
                <label class="form-check-label" for="user_all">
                    すべて表示
                </label>
            </div>
            <div>
                <input class="form-check-input radio" type="radio" name="user_radio" id="user_admin" data-url="{{ route('admin_user_list') }}" style="transform:scale(1.5);">
                <label class="form-check-label" for="user_admin">
                    管理者のみ
                </label>
            </div>
            <div>
                <input class="form-check-input radio" type="radio" name="user_radio" id="user_common" data-url="{{ route('common_user_list') }}" style="transform:scale(1.5);">
                <label class="form-check-label" for="user_common">
                    一般のみ
                </label>
            </div>
            <button type="button" class="btn btn-primary btn-lg" id="new" data-toggle="modal" data-target="#exampleModal">新規登録</button>
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
                @foreach($users as $user)
                    {{-- 携帯電話番号をハイフンで区切るように整形 --}}
                    @php
                        $phone1 = mb_substr($user->phone, 0, 3);
                        $phone2 = mb_substr($user->phone, 3, 4);
                        $phone3 = mb_substr($user->phone, 7, 4);
                    @endphp
                    <tr>
                        <th scope="row" class="align-middle">{{ $loop->iteration }}</th>
                        <td class="align-middle">{{ $user->name }}</td>
                        <td class="align-middle">{{ $user->email }}</td>
                        <td class="align-middle">{{ $phone1 }}-{{ $phone2 }}-{{ $phone3 }}</td>
                        <td class="align-middle">{{ $user->admin === "0" ? "一般" : "管理者" }}</td>
                        <td class="align-middle" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-url="{{ route('modal_data', ['id' => $user->id]) }}">
                            <button type="button" class="btn btn-success change">変更</button>
                            <button type="button" class="btn btn-secondary delete">削除</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal" id="exampleModal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>

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
