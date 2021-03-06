<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="customerModalLabel">顧客登録</h5>
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
                <input type="text" class="form-control post-data" id="input-name" name="item[name]" value="{{ $customer->name }}">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="input-tel">電話番号</label>
                </div>
                <input type="text" class="form-control post-data" id="input-email" name="item[tel]" value="{{ $customer->tel }}">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="input-address">住所</label>
                </div>
                <input type="text" class="form-control post-data" id="input-address" name="item[address]" value="{{ $customer->address }}">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="input-copy">部数</label>
                </div>
                <input type="number" class="form-control post-data" id="input-copy" name="item[copy]" min="0" value="{{ $customer->copy }}">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="submit"
                    data-id="{{ $customer->id }}"
                    data-url-create="{{ route('customer_create') }}"
                    data-url-update="{{ route('customer_update') }}">保存</button>
            <button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">閉じる</button>
        </div>
    </div>
</div>
