@extends('layouts.app')

@section('title', 'ポイント管理')

@section('content')
    <div class="container">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h3 class="mb-0">配達ポイント一覧</h3>
            <button type="button" class="btn btn-primary btn-lg" id="new" data-toggle="modal" data-target="#customerModal">新規登録</button>
        </div>

        <div class="d-flex mb-3 ml-auto w-50 align-items-center">
            <label for="input-search" class="sr-only">ポイント名など</label>
            <input type="text" class="form-control mr-1 ml-auto w-50" id="input-search" placeholder="ポイント名など">
            <button type="button" id="search" class="btn btn-primary mr-1" data-url="#">検索</button>
            <button type="button" id="reset" class="btn btn-secondary" data-url="#">リセット</button>
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
        <div class="modal fade" id="customerModal" tabindex="-1" data-backdrop="static" aria-labelledby="customerModalLabel" aria-hidden="true">
            @include('Point/point_modal_item')
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#nav-point').addClass('active');
    </script>
    <script src="{{ asset('js/common.js') }}"></script>
@endsection
