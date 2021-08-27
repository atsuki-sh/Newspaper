<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="pointModalLabel" data-id="{{ $route->id }}">{{ $route->name }} のポイント情報</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span id="x" aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <h5>配達ポイントの検索</h5>
            <div class="d-flex align-items-center mb-3">
                <label for="input-search-point" class="sr-only">ポイント名</label>
                <input type="text" class="form-control mr-1 flex-fill" id="input-search-point" placeholder="ルート名">
                <button type="button" id="btn-search-point" class="btn btn-primary mr-1 text-nowrap" data-url="">検索</button>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th class="text-center p-1" scope="col">名前</th>
                </tr>
                </thead>
                <tbody id="searched-list"></tbody>
            </table>
        </div>

        <div class="modal-body">
            <h5>登録済みのポイント</h5>
            <table class="table">
                <thead>
                <tr>
                    <th class="text-center p-1" scope="col">名前</th>
                </tr>
                </thead>
                <tbody id="registered-list">
                @include('DeliveryRoute/point_list', ['points' => $points, 'bool' => true])
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
        </div>
    </div>
</div>
