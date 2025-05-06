@extends('layouts.app')

@section('content')
    <div class="user-details">
        <h1 class="text-2xl font-bold">User Details</h1>
        <p class="mt-4">Name: {{ $user->name }}</p>
        <p class="mt-2">Email: {{ $user->email }}</p>
        <p class="mt-2">Role: {{ $user->role }}</p>
        <!-- Add more details as needed -->
    </div>
@endsection
