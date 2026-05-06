@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <a class="btn btn-primary mt-4 ml-4" href="{{ route('posts.index') }}">back</a>
        <a href="{{ route('users.create') }}" class="btn btn-secondary  ml-4 mt-4">Add new user</a>
        <input type="submit" value="Logout" class="btn btn-danger mt-4 ml-4">
    </form>

    <hr>
    <div class="container text-center">
        <div class="row gy-5">
            @forelse ($users as $user)
                <div class="col-6">
                    <div class="p-3">
                        <h1 class="">{{ $user->name }}</h1>
                        <p class="">{{ $user->email }}</p>
                        <p class="">{{ $user->roles[0]->name }}</p>

                        {{-- <a class="btn btn-secondary mb-1" href="{{ route('users.show', $user->id) }}">Read More..</a> --}}
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
