@extends('admin.layout-admin')

@section('content')
@include('partials._hero2')
@include('partials._search-user')

<a href="/admin/admin" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back </a>

<table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Employee name</th>
                    <th>E-mail</th>
                    <th>Points</th>
                    <th>Actions</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->points }}</td>
                        <td>
                            <a href="{{ route('admin.users.show', $user->id) }}" class="text-blue-800 mr-5"><i class="fa-solid fa-eye"></i>View</a>


                            
                        </td>
                        <td>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-800 mr-5"><i class="fa-solid fa-pen-to-square"></i>Edit</a>

                             
                                <button type="submit" class="text-red-800 mr-5"> <i class="fa-solid fa-trash-can"></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
</table>

@endsection

