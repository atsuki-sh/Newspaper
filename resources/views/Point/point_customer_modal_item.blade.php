<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="customerModalLabel">{{ $point->name }} の顧客情報</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span id="x" aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <h5>顧客の検索</h5>
            <div class="d-flex align-items-center mb-3">
                <label for="search-customer" class="sr-only">顧客名など</label>
                <input type="text" class="form-control mr-1 flex-fill" id="search-customer" placeholder="顧客名など">
                <button type="button" id="btn-search-customer" class="btn btn-primary mr-1 text-nowrap" data-url="#">検索</button>
                <button type="button" id="btn-reset-customer" class="btn btn-secondary text-nowrap" data-url="#">リセット</button>
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
                <tbody id="searched-list">
{{--                <tr class="table-light">--}}
{{--                    <td class="align-middle text-center p-1 pl-2 pr-2">shinoto</td>--}}
{{--                    <td class="align-middle text-center p-1 pl-2 pr-2">長曾根南町</td>--}}
{{--                    <td class="align-middle text-center p-1 pl-2 pr-2">3</td>--}}
{{--                    <td class="align-middle text-center p-1 pl-2 pr-2">--}}
{{--                        <button type="button" class="btn btn-success text-nowrap" data-url="">登録</button>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr class="table-light">--}}
{{--                    <td class="align-middle text-center p-1 pl-2 pr-2">atsuki</td>--}}
{{--                    <td class="align-middle text-center p-1 pl-2 pr-2">彦根市長曽根南町494-25 ファーストハイツ205号室</td>--}}
{{--                    <td class="align-middle text-center p-1 pl-2 pr-2">3</td>--}}
{{--                    <td class="align-middle text-center p-1 pl-2 pr-2">--}}
{{--                        <button type="button" class="btn btn-success text-nowrap" disabled data-url="">登録</button>--}}
{{--                    </td>--}}
{{--                </tr>--}}
                </tbody>
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
                @include('Point/point_customer_list_item', ['customers' => $customers])
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="submit">保存</button>
            <button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">閉じる</button>
        </div>

    </div>
</div>
