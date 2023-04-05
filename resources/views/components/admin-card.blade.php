@props(['product'])

<x-card>
<div class="bg-white rounded-lg overflow-hidden shadow-md">
    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
    <div class="p-4">
        <div class="flex">
            <img
                class="hidden w-48 mr-6 md:block"
                src="{{$product->logo ? asset ('storage/' .  $product->logo): asset('/images/laravel-img.png')}}"
                alt=""
            />
            <div>
                <h3 class="text-2xl">
                    <a href="/products/{{$product->id}}">{{$product->title}}</a>
                </h3>
                <x-product-tags :tagsCsv="$product->tags"/>
            </div>
           
        </div>
        <div class="mt-4 flex justify-between">
            <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
            </form>
        </div>
    </div>
</div>
</x-card>

