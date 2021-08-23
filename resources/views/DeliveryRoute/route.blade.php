@extends('layouts.app')

@section('title', '配達ルート管理')

@section('content')
    配達ルートの管理画面です
@endsection

@section('script')
    <script>
        $('#nav-route').addClass('active');
    </script>
    <script src="{{ asset('js/common.js') }}"></script>
@endsection
