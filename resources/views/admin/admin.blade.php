@extends('admin.layout-admin')

@section('content')
	@include('partials._hero')

	<div class="flex m-10 mt-5">
		<div class="w-3/4 md:w-1/2 lg:w-2/5">
			<h1 class="text-3xl font-bold mb-4">Welcome to the Admin Dashboard</h1>
			<p class="text-lg mb-4">You have access to the following features:</p>
			<ul class="list-disc list-inside">
				<li class="text-lg">View, update and delete user accounts</li>
				<li class="text-lg">Create, view, update and delete product listings</li>
				<li class="text-lg">View and analyze sales reports</li>
			</ul>
		</div>
	</div>
@endsection





