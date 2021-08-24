<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">顧客登録</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span id="x" aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <h5>顧客の検索</h5>
            <div class="d-flex align-items-center">
                <label for="search-customer" class="sr-only">顧客名など</label>
                <input type="text" class="form-control mr-1 flex-fill" id="search-customer" placeholder="顧客名など">
                <button type="button" id="btn-search-customer" class="btn btn-primary mr-1 text-nowrap" data-url="#">検索</button>
                <button type="button" id="btn-reset-customer" class="btn btn-secondary text-nowrap" data-url="#">リセット</button>
            </div>
        </div>
        <div class="modal-body">
            <h5>登録済みの顧客</h5>
        </div>
        <div class="modal-footer" data-url-create="{{ route('customer_create') }}" data-url-update="{{ route('customer_update') }}" data-id="">
            <button type="button" class="btn btn-primary" id="submit">保存</button>
            <button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">閉じる</button>
        </div>
    </div>
</div>
