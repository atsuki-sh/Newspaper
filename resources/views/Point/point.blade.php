@extends('layouts.app')

@section('title', 'ポイント管理')

@section('content')
    <div class="container">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h3 class="mb-0">配達ポイント一覧</h3>
            <button type="button" class="btn btn-primary btn-lg text-nowrap" id="new">新規登録</button>
        </div>

        <div class="d-flex mb-3 align-items-center">
            <label for="input-search" class="sr-only">ポイント名</label>
            <input type="text" class="form-control mr-1 ml-auto w-25" id="input-search" placeholder="ポイント名">
            <button type="button" id="btn-search-point" class="btn btn-primary mr-1 text-nowrap" data-url="{{ route('point_search') }}">検索</button>
            <button type="button" id="btn-search-reset" class="btn btn-secondary text-nowrap">リセット</button>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ポイント名</th>
                <th scope="col">配達ルートID</th>
                <th scope="col">北緯</th>
                <th scope="col">東経</th>
                <th scope="col">最終更新者</th>
                <th scope="col">操作</th>
            </tr>
            </thead>
            <tbody id="point-list" data-url="{{ route('point_list') }}">
            @include('Point/point_list_item', ['points' => $points])
            </tbody>
        </table>

        {{--        モーダル--}}
        <div class="modal fade" id="customerModal" tabindex="-1" data-backdrop="static" aria-labelledby="customerModalLabel" aria-hidden="true"></div>
    </div>
@endsection

@section('script')
    <script>
        $('#nav-point').addClass('active');
    </script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/point.js') }}"></script>
@endsection
