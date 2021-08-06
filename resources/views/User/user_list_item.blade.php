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
