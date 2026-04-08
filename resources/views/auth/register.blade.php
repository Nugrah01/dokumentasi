@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <form method="POST" action="/register" class="bg-white p-6 rounded shadow w-96">
        @csrf

        <h2 class="text-xl font-bold mb-4">Admin Register</h2>

        <input type="text" name="name" placeholder="Name"
            class="w-full border p-2 mb-3 rounded" required>

        <input type="email" name="email" placeholder="Email"
            class="w-full border p-2 mb-3 rounded" required>

        <input type="password" name="password" placeholder="Password"
            class="w-full border p-2 mb-3 rounded" required>

        <input type="password" name="password_confirmation"
            placeholder="Confirm Password"
            class="w-full border p-2 mb-3 rounded" required>

        <button class="w-full bg-green-600 text-white p-2 rounded">
            Register
        </button>
    </form>
</div>
@endsection