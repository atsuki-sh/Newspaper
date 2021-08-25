<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="customerModalLabel" data-id="{{ $point->id }}">{{ $point->name }} の顧客情報</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span id="x" aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <h5>顧客の検索</h5>
            <div class="d-flex align-items-center mb-3">
                <label for="input-search-customer" class="sr-only">顧客名など</label>
                <input type="text" class="form-control mr-1 flex-fill" id="input-search-customer" placeholder="顧客名・電話番号・住所">
                <button type="button" id="btn-search-customer" class="btn btn-primary mr-1 text-nowrap" data-url="{{ route('point_customer_search') }}">検索</button>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th class="text-center p-1" scope="col">名前</th>
                    <th class="text-center p-1" scope="col">住所</th>
                    <th class="text-center text-nowrap p-1" scope="col">部数</th>
                    <th class="text-center p-1" scope="col"></th>
                </tr>
                </thead>
                <tbody id="searched-list"></tbody>
            </table>
        </div>

        <div class="modal-body">
            <h5>登録済みの顧客</h5>
            <table class="table">
                <thead>
                <tr>
                    <th class="text-center p-1" scope="col">名前</th>
                    <th class="text-center p-1" scope="col">住所</th>
                    <th class="text-center text-nowrap p-1" scope="col">部数</th>
                    <th class="text-center p-1" scope="col"></th>
                </tr>
                </thead>
                <tbody id="registered-list">
                @include('Point/point_customer_list_item', ['customers' => $customers, 'bool' => true])
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
        </div>

    </div>
</div>
