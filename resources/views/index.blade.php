@extends('layouts.master')
@section('title', 'Home')
@section('content')

<div class="container mt-5">
    <div class="jumbotron shadow p-3 mb-5 bg-body-tertiary rounded">
        <h1 class="display-4">Welcome to Laravel-Product-App</h1>
        <p class="lead">This is a simple Product-Management Laravel project.</p>
        <hr class="my-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Products</h5>
                        <p class="card-text">Discover our products.</p>
                        <a href="{{ route('products.index') }}" class="btn btn-primary">View Products</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Categories</h5>
                        <p class="card-text">Explore our categories.</p>
                        <a href="{{ route('categories.index') }}" class="btn btn-primary">View Categories</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection