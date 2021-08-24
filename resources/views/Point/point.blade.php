@extends('layouts.app')

@section('title', 'ポイント管理')

@section('content')
    配達ポイントの管理画面です
@endsection

@section('script')
    <script>
        $('#nav-point').addClass('active');
    </script>
    <script src="{{ asset('js/common.js') }}"></script>
@endsection
