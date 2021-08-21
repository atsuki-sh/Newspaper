@extends('layouts.app')

@section('title', "お客様管理")

@section('content')
    <div class="container">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h3 class="mb-0">お客様一覧</h3>
            <button type="button" class="btn btn-primary btn-lg" id="new" data-toggle="modal" data-target="#exampleModal">新規登録</button>
        </div>

        <div class="d-flex ml-auto w-50 align-items-center">
            <label for="input-search" class="sr-only">名前など</label>
            <input type="text" class="form-control mr-1 ml-auto w-50" id="input-search" data-url="{{ route('search_user') }}" placeholder="名前など">
            <button type="button" id="btn-search" class="btn btn-primary">検索</button>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#nav-customer').addClass('active');
    </script>
@endsection
