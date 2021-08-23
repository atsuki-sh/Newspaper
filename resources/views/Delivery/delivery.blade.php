@extends('layouts.app')

@section('title', '配達管理')

@section('content')
    配達の管理画面です
@endsection

@section('script')
    <script>
        $('#nav-deliver').addClass('active');
    </script>
    <script src="{{ asset('js/common.js') }}"></script>
@endsection
