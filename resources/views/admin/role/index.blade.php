@extends('layouts.app')

@section('title', 'Roles')

@section('content')
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <a class="btn btn-primary mt-4 ml-4" href="{{ route('posts.index') }}">back</a>
        <a href="{{ route('roles.create') }}" class="btn btn-secondary  ml-4 mt-4">Add new role</a>
        <input type="submit" value="Logout" class="btn btn-danger mt-4 ml-4">
    </form>

    <hr>
    <div class="container text-center">
        <div class="row gy-5">
            @forelse ($roles as $role)
                <div class="col-6">
                    <div class="p-3">
                        <h1 class="">{{ $role->name }}</h1>
                        <p>Permission Name:</p>
                        <ul>
                            @foreach ($role->permissions as $permission)
                                <li>{{ $permission->name }}</li>
                            @endforeach
                        </ul>

                        <a class="btn btn-secondary mb-1" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger mb-1" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <h1>There Is No Roles</h1>
            @endforelse
        </div>
    </div>
@endsection
