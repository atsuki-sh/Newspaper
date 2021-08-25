@extends('layouts.app')

@section('title', "お客様管理")

@section('content')
    <div class="container">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h3 class="mb-0">お客様一覧</h3>
            <button type="button" class="btn btn-primary btn-lg" id="new" data-toggle="modal" data-target="#exampleModal">新規登録</button>
        </div>

        <div class="d-flex mb-3 ml-auto w-50 align-items-center">
            <label for="input-search" class="sr-only">名前など</label>
            <input type="text" class="form-control mr-1 ml-auto w-50" id="input-search" placeholder="名前など">
            <button type="button" id="search" class="btn btn-primary mr-1" data-url="{{ route('customer_search') }}">検索</button>
            <button type="button" id="reset" class="btn btn-secondary" data-url="{{ route('customer_list') }}">リセット</button>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">名前</th>
                <th scope="col">電話番号</th>
                <th scope="col">住所</th>
                <th scope="col">部数</th>
                <th scope="col">最終更新者</th>
                <th scope="col">操作</th>
            </tr>
            </thead>
            <tbody id="customer-list" data-url="{{ route('customer_list') }}">
            @include('Customer/customer_list_item', ['customers' => $customers])
            </tbody>
        </table>

{{--        モーダル--}}
        <div class="modal fade" id="exampleModal" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
            @include('Customer/customer_modal_item', ['customer' => $customers[0]])
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#nav-customer').addClass('active');
    </script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/customer.js') }}"></script>
@endsection
