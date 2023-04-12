@props(['product'])


<x-card>
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
                <form action="{{ route('products.buy', $product->id) }}" method="post">
                    @csrf
                    <button type="submit" class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600 absolute mt-6">
                        To buy
                    </button>
                </form>

        </div>
       
    </div>
</x-card>