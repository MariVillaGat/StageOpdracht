@extends('layout')

@section('content')
@include('partials._hero1')

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col"> Month</th>
        <th scope="col"> Points</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td></td>
        <td></td>
        
      </tr>
      <tr>
        <th scope="row">2</th>
        <td></td>
        <td></td>
       
      </tr>
      <tr>
        <th scope="row">3</th>
        <td colspan="2"></td>
        
      </tr>

      <a
      href="/"
      class="absolute top-1/3 right-10 bg-black rounded text-white py-2 px-5"
      >Back</a>

    </tbody>
    </table>
 
  
@endsection
