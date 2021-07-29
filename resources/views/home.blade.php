@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">ユーザー管理</h5>
                    <p class="card-text">ユーザーの管理画面です</p>
                    <a href="{{ url('/user') }}" class="btn btn-primary">移動</a>
                </div>
            </div>
        </div>
        <div class="col-md-5 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">お客様管理</h5>
                    <p class="card-text">お客様の管理画面です</p>
                    <a href="#" class="btn btn-primary">移動</a>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">配達管理</h5>
                    <p class="card-text">配達の管理画面です</p>
                    <a href="#" class="btn btn-primary">移動</a>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">ポイント管理</h5>
                    <p class="card-text">ポイントの管理画面です</p>
                    <a href="#" class="btn btn-primary">移動</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
