@extends('layouts.app')

@section('title', '配達ルート管理')

@section('content')
    <div class="container">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h3 class="mb-0">配達ルート一覧</h3>
            <button type="button" class="btn btn-primary btn-lg text-nowrap" id="new"
                    data-toggle="modal" data-target="#routeModal">新規登録</button>
        </div>

        <div class="d-flex mb-3 align-items-center">
            <label for="input-search" class="sr-only">ルート名</label>
            <input type="text" class="form-control mr-1 ml-auto w-25" id="input-search" placeholder="ポイント名">
            <button type="button" id="btn-search-route" class="btn btn-primary mr-1 text-nowrap"
                    data-url="{{ route('route_search') }}">検索</button>
            <button type="button" id="btn-reset-route" class="btn btn-secondary text-nowrap">リセット</button>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ルート名</th>
                <th scope="col">最終更新者</th>
                <th scope="col" class="text-center">操作</th>
            </tr>
            </thead>
            <tbody id="route-list" data-url="{{ route('route_list') }}">
            @include('DeliveryRoute/route_list', ['routes' => $routes])
            </tbody>
        </table>
    </div>

    {{-- モーダル --}}
    <div class="modal fade" id="routeModal" tabindex="-1" data-backdrop="static" aria-labelledby="routeModalLabel" aria-hidden="true">
        @include('DeliveryRoute/route_modal', ['route' => $routes[0]])
    </div>
    <div class="modal fade" id="routePointModal" tabindex="-1" data-backdrop="static" aria-labelledby="routePointModalLabel" aria-hidden="true"></div>
@endsection

@section('script')
    <script>
        $('#nav-route').addClass('active');
    </script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/route.js') }}"></script>
@endsection
