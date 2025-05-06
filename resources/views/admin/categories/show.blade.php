@extends('admin.layouts')

@section('content')
    <div class="container">
      <h1>details</h1>
      <p>Name: {{ $category->name }}</p>
      <p>Created At: {{ $category->created_at }}</p>
      <p>Updated At: {{ $category->updated_at }}</p>
    </div>
@endsection