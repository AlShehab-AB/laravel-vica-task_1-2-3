@extends('layouts.app')
@section('title' , 'dashboard')

@section('content')

    <div class="container">
        <a href="{{ route('posts.create') }}" class="btn btn-primary mt-4 ml-4">Add New Post</a>
        <a href="{{ route('users.create') }}" class="btn btn-primary mt-4 ml-4">Add New User</a>
        <a href="{{ route('posts.index') }}" class="btn btn-danger mt-4 ml-4">Back</a>
    </div>
    <hr>
    <div class="container text-center">
        <div class="row gy-5">
            @forelse ($users as $user)
                <div class="col-6">
                    <div class="p-3">
                        <h1 class="">{{ $user->name }}</h1>
                        <p class="">{{ $user->email }}</p>
                        <a class="btn btn-secondary mb-1" href="{{ route('users.edit', $user->id) }}">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger mb-1" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <h1>There Is No Users</h1>
            @endforelse
        </div>
    </div>

@endsection