@extends('admin.layouts')

@section('content')
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        // Add your form fields here to modify the user
        <input type="text" name="name" value="{{ $user->name }}">
        <input type="email" name="email" value="{{ $user->email }}">
        

        <button type="submit">Update User</button>
    </form>
