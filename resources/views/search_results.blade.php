@extends('adminlte::page')

@section('title', 'Search Results for "' . ($query ?? '') . '" - ' . config('app.name'))

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Search Results for "<span class="text-indigo-600">{{ $query ?? '' }} </span>"
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-6 text-center">Search Results</h1>
                <a href="{{ route('categories.index') }}"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mb-6 transition-all duration-200 ease-in-out transform hover:-translate-y-1">
                    <p> Back To Categories </p>
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
                                        <td class="mx-6 my-3 whitespace-nowrap text-medium border-separate border-spacing-10 border border-gray-400 text-gray-700">{{ $loop->iteration }}</td>
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
@endsection