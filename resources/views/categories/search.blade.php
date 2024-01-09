@extends('layouts.master')
@section('title', 'Categories Search')
@section('content')
<div class="row justify-content-center mt-4 mb-4">
    <div class="col-md-6">
        <form action="{{ route('categories.search') }}" method="GET" class="form-inline">
            <div class="input-group" style="box-shadow: 1px 1px 1px 0px #adb5bd;">
                <input type="text" class="form-control" name="search" placeholder="Search by category name...">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="categories-container container-fluid">
    <h2 class="text-center mb-4">Search Results</h2>

    @if($categories->count() > 0)
    <p class="text-center mb-3">Showing {{ $categories->count() }} result(s) for: "{{ request()->input('search') }}"
        <a href="{{ route('categories.index') }}" class="btn btn-outline-danger" style="margin-left: 3px;">
            <i class="fas fa-times-circle"></i>
        </a>
    </p>
    <table class="table table-striped table-bordered mx-auto mt-4 mb-4" style="width: auto;">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
            </tr>
        </thead>
        <tbody>
            @php $count = 1; @endphp
            @foreach($categories as $category)
            <tr>
                <th scope="row" class="text-center align-middle">{{ $count }}</th>
                <td class="text-sm-left align-middle">{{ $category->name }}</td>
            </tr>
            @php $count++; @endphp
            @endforeach
        </tbody>
    </table>
    @else
    <p class="text-center">No results found for: "{{ request()->input('search') }}"</p>
    @endif
</div>
@endsection