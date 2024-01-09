@extends('layouts.master')
@section('title', 'Products')
@section('content')
<div class="row justify-content-center mt-4 mb-4">
    <div class="col-md-6">
        <form action="{{ route('products.search') }}" method="GET" class="form-inline">
            <div class="input-group" style="box-shadow: 1px 1px 1px 0px #adb5bd;">
                <input type="text" class="form-control" name="search" placeholder="Search by product name or category...">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search">Submit</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="products-container container-fluid">
    <h2 class="text-center mb-4">Recently Created Products</h2>
    <table class="table table-striped table-bordered mx-auto mt-4 mb-4" style="width: auto;">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
            </tr>

        </thead>
        <tbody>
            @php
            $count = $products->count();
            @endphp
            @foreach($products as $product)
            <tr>
                <th scope="row" class="text-center align-middle">{{$count}}</th>
                <td class="text-center align-middle">{{$product->name}}</td>
                <td class="text-center align-middle">{{$product->category->name}}</td>
                <td class="text-center align-middle">{{strip_tags($product->description)}}</td>
                <td class="text-center align-middle" style="height: 120px;">
                    @if($product->image)
                    <img src="{{ asset($product->image) }}" class="img-fluid" width="120" alt="product image">
                    @else
                    No Image
                    @endif
                </td>
            </tr>
            @php
            $count--;
            @endphp
            @endforeach
        </tbody>
    </table>
</div>
@endsection