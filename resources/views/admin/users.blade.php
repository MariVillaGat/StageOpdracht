@extends('layout')

@section('content')
@include('partials._hero')
    <div class="container">
        <h1>Users</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary" ><i
                                    class="fa-solid fa-pen-to-square"
                                ></i>Edit</a>
                                <button type="submit" class="text-red-600 mr-3"> <i class="fa-solid fa-trash-can"></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
