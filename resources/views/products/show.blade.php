@extends('layout')
@section('content')

<a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back </a>
            <div class="mx-4">
                <x-card class="p-10 ">
                    <div class="flex flex-col items-center justify-center text-center">
                        <img
                            class="w-48 mr-6 mb-6"
                            src="{{$product->logo ? asset('storage/' .  $product->logo): asset('/images/laravel-img.png')}}"
                            alt=""
                        />

                        <h3 class="text-2xl mb-2"> {{$product->title}} </h3>


                        <x-product-tags :tagsCsv="$product->tags"/>

                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Product description
                            </h3>
                            <div class="text-lg space-y-6">
                                {{$product->description}}

                            </div>
                        </div>
                    </div>
                </x-card>
                
            </div>
@endsection