@extends('admin.layout-admin')


@section('content')
    @include('partials._hero3')
    @include('partials._search')

<a href="/admin/admin" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back </a>
    <div class="container d-flex justify-content-center text-center align-items-center vh-500">
     <div class="mx-4">
        <table class="table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">Image</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @unless(count($products) == 0)
                    @foreach($products as $product)
                        <tr>
                            <td class="border px-4 py-2">
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-24 object-cover">
                            </td>
                            <td class="border px-4 py-2">
                                <a href="/admin/products/{{$product->id}}">{{$product->title}}</a>
                            </td>
                            <td class="border px-4 py-2">
                                {{$product->price}}
                            </td>
                            <td class="border px-4 py-2">
                                <div class="flex">
                                    <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                    </form>
                                </div>
                            </td>
                            
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="border px-4 py-2 text-center">No products found</td>
                    </tr>
                   
                @endunless
            </tbody>
     
            
        </table>
        <div class="">
            <a
            href="/admin/products/create"
            class="btn btn-primary my-4 float-right"
            >Add new product</a
        </div>
    
    
    

        <div class="mt-6 p-4">
            {{ $products->links() }}
        </div>
    
    </div>
</div>


@endsection

