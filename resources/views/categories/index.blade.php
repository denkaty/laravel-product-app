@extends('layouts.master')
@section('title', 'Categories Search')
@section('content')
<div class="row justify-content-center mt-4 mb-4">
    <div class="col-md-6">
        <form action="{{ route('categories.search') }}" method="GET" class="form-inline">
            <div class="input-group" style="box-shadow: 1px 1px 1px 0px #adb5bd;">
                <input type="text" class="form-control" name="search" placeholder="Search by category name...">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search">Submit</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="categories-container container-fluid">
    <h2 class="text-center mb-4">Recently Created Categories</h2>
    <table class="table table-striped table-bordered mx-auto mt-4 mb-4" style="width: auto;">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
            </tr>

        </thead>
        <tbody>
            @php
            $count = $categories->count();
            @endphp
            @foreach($categories as $category)
            <tr>
                <th scope="row" class="text-center align-middle">{{$count}}</th>
                <td class="text-center align-middle">{{$category->name}}</td>
            </tr>
            @php
            $count--;
            @endphp
            @endforeach
        </tbody>
    </table>
</div>
@endsection