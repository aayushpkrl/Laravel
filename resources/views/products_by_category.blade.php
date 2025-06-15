@extends('adminlte::page')

@section('title', 'Products in ' . $category->title . ' - ' . config('app.name'))

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Products in <span class="text-indigo-600"> {{ $category->title }}</span>
    </h2>
@endsection

@section('content')
<div class='py-12'>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div clas="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-900 mb-6 text-center">Products</h1>

                    <a href="{{ route('categories.index') }}">
                        <p class="text-lg text-green opacity-10"> Back to Categories </p>
                        </a>
                    @if ($products->isEmpty())
                        <p class="text-gray-900 text-center text-lg mt-8">No Products available</p>
                    @else
                        <div class="overflow-x-auto rounded-lg shadow-md">
                            <table class="min-w-full auto divide-y divide-x divide-gray-200 border-separate border-spacing-10 border border-gray-400">
                                <thead class="bg-gray-700 text-black border-spacing-10">
                                    <tr>
                                        <th scope="col" class="px-7 py-7 text-2xl items-center border-separate border-spacing-10 border border-gray-400">ID</th>
                                        <th scope="col" class="px-7 py-7 text-2xl items-center border-separate border-spacing-10 border border-gray-400">IMAGE</th>
                                        <th scope="col" class="px-7 py-7 text-2xl items-center border-separate border-spacing-10 border border-gray-400">TITLE</th>
                                        <th scope="col" class="px-7 py-7 text-2xl items-center border-separate border-spacing-10 border border-gray-400">DESCRIPTIONS</th>
                                        <th scope="col" class="px-7 py-7 text-2xl items-center border-separate border-spacing-10 border border-gray-400">PRICE</th>
                                        <th scope="col" class="px-7 py-7 text-2xl items-center border-separate border-spacing-10 border border-gray-400">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td class="mx-6 my-3 whitespace-nowrap text-medium border-separate border-spacing-10 border border-gray-400 text-gray-700">{{ $product->id }}</td>
                                            <td class="mx-6 my-3 whitespace-nowrap text-medium border-separate border-spacing-10 border border-gray-400 text-gray-700">
                                                @if ($product->image)
                                                    <img src="{{ $product->image }}" alt="{{ $product->title }}" class="h-15 w-15 object-cover rounded-md">
                                                @else
                                                    <p> No image available </p>
                                                @endif
                                            </td>
                                            <td class="mx-7 my-3 whitespace-nowrap text-lg text-left text-medium border-separate border-spacing-10 border border-gray-400 text-gray-700">{{ $product->title }}</td>
                                            <td class="mx-7 my-3 whitespace-nowrap text-lg text-left text-medium border-separate border-spacing-10 border border-gray-400 text-gray-700">{{ $product->description }}</td>
                                            <td class="mx-7 my-3 whitespace-nowrap text-lg text-left text-medium border-separate border-spacing-10 border border-gray-400 text-gray-700">{{ $product->price }}</td>
                                            <td class="mx-7 my-3 whitespace-nowrap text-lg text-left text-medium border-separate border-spacing-10 border border-gray-400">
                                                <span class="{{ $product->status ? 'status-active' : 'status-inactive' }}">
                                                    {{ $product->status ? 'Active' : 'Out of stock' }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
