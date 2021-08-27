<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="userModalLabel">ユーザー登録</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span id="x" aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="alert alert-danger d-none" id="error-messages"></div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="input-name">名前</label>
                </div>
                <input type="text" class="form-control post-data" id="input-name" name="item[name]" value="{{ $user->name }}" aria-label="Username">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="input-email">メールアドレス</label>
                </div>
                <input type="text" class="form-control post-data" id="input-email" name="item[email]" value="{{ $user->email }}" aria-label="MailAddress">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="input-phone1">携帯電話番号</label>
                </div>
                @php
                    $phone1 = mb_substr($user->phone, 0, 3);
                    $phone2 = mb_substr($user->phone, 3, 4);
                    $phone3 = mb_substr($user->phone, 7, 4);
                @endphp
                <input type="tel" class="form-control phone" id="input-phone1" name="item[phone1]" value="{{ $phone1 }}" aria-label="PhoneNumber1">
                <h3 class="mb-0 ml-1 mr-1">-</h3>
                <input type="tel" class="form-control phone" id="input-phone2" name="item[phone2]" value="{{ $phone2 }}" aria-label="PhoneNumber2">
                <h3 class="mb-0 ml-1 mr-1">-</h3>
                <input type="tel" class="form-control phone" id="input-phone3" name="item[phone3]" value="{{ $phone3 }}" aria-label="PhoneNumber3">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="input-admin">権限</label>
                </div>
                <select class="custom-select post-data form-control" id="input-admin" name="item[admin]">
                    <option value="0" {{ $user->admin === '0' ? 'selected' : '' }}>一般</option>
                    <option value="1" {{ $user->admin === '1' ? 'selected' : '' }}>管理者</option>
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
            <button type="button" class="btn btn-primary" id="submit"
                    data-id="{{ $user->id }}"
                    data-url-create="{{ route('user_create') }}"
                    data-url-update="{{ route('user_update') }}">保存</button>
            <button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">閉じる</button>
        </div>
    </div>
</div>
