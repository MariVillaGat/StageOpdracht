@extends('admin.layout-admin')


@section('content')
    @include('partials._hero')
    @include('partials._search')

    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
          <h2 class="text-2xl font-bold uppercase mb-1">Edit {{$product->title}}</h2>
        </header>
            <form method="POST" action="/admin/products/{{$product->id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label
                        for="title"
                        class="inline-block text-lg mb-2"
                        >Product name</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="title" value="{{$product->title}}"
                    />

                @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

                </div>

                <div class="mb-6">
                    <label for="price" class="inline-block text-lg mb-2"
                        > Price</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="price" value="{{$product->price}}"
                    />
                    @error('price')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">
                    <label for="tags" class="inline-block text-lg mb-2">
                        Tags (Comma Separated)
                    </label>
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="tags" value="{{$product->tags}}"
                        placeholder="Example: It, Computer, Hardware, etc"
                    />
                    @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">
                    <label for="logo" class="inline-block text-lg mb-2">
                        Product Img
                    </label>
                    <input
                        type="file"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="logo"
                    />

                    <img
                    class="w-48 mr-6 mb-6"
                    src="{{$product->logo ? asset('storage/' .  $product->logo): asset('/images/laravel-img.png')}}"
                    alt=""
                />

                    @error('logo')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">
                    <label
                        for="description"
                        class="inline-block text-lg mb-2"
                    >
                        Product Description
                    </label>
                    <textarea
                        class="border border-gray-200 rounded p-2 w-full"
                        name="description"
                        rows="10"
                    >{{$product->description}}</textarea>
                    @error('description')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">
                    <button
                        class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                    >
                        Update Product
                    </button>

                    <a href="/admin/products" class="text-black ml-4"> Back </a>
                </div>
            </form>
        </x-card>
@endsection