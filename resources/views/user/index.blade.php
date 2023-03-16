@extends('layout/main')

@section('content')
@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session()->get('success') }}
</div>
@endif
<h1 class="h3">{{ $title }}</h1>
<a href="/user/create" class="btn btn-primary mb-3">Create User</a>
<div class="table-responsive">
    <table class="table table-bordered text-center">
        <thead class="bg-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Role</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td><a href="/user/{{ $user['id'] }}" class="text-decoration-none">{{ $user['username'] }}</a></td>
                <td>{{ $user['role'] }}</td>
                <td>{{ $user['created_at'] }}</td>
                <td>{{ $user['updated_at'] }}</td>
                <td>
                    <a href="/user/edit/{{ $user['id'] }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="/user/{{ $user['id'] }}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection