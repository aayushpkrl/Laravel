@extends('adminlte::page')

@section('title', 'Product Categories - ' . config('app.name'))

@section('header')
    <h2 class="font-semibold text-xl text-gray-700">
        Product Categories
    </h2>
@endsection

@section('content')
    <div class='py-12'>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-black-900"> -->
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-900 mb-6 text-center">Product Categories</h1>

                    @if ($categories->isEmpty())
                        <p class="text-gray-600 text-center text-lg mt-8">No Products available</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap:6">
                            @foreach ($categories as $category)
                                <a href="{{ route('products.by_category', $category->id) }}">
                                    <div class="text-2xl font-bold mb-10">
                                        <div class="text-7xl text-green font-bold mb-2">{{ $category->title }}</div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            <!-- </div> -->
        </div>
    </div>
@endsection
