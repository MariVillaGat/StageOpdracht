@extends('admin.layout-admin')


@section('content')

<a href="/admin/users" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back </a>
            <div class="mx-4">
                <x-card class="p-10 ">
                    <div class="flex flex-col items-center justify-center text-center">
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Name: {{$user->name }}
                            </h3>                                                         
                        </div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Email: {{$user->email }}
                            </h3>                                                         
                        </div>

                          <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Score: {{$user->score }}
                            </h3>                                                         
                        </div>
                        </div>
                      
                       
                         <p><strong>Created at:</strong> {{ $user->created_at }}</p>
                        <p><strong>Updated at:</strong> {{ $user->updated_at }}</p>                 

                        

                        <div class="border border-gray-200 w-full mb-6"></div>
                       
                    </div>
                </x-card>
               
            </div>
@endsection