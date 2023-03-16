@extends('layout/main')

@section('content')
<h1 class="h3">{{ $title }}</h1>
<div class="row">
    <div class="col col-md-6">
        <ul class="list-group">
            <li class="list-group-item">ID: {{ $user['id'] }}</li>
            <li class="list-group-item">Username: {{ $user['username'] }}</li>
            <li class="list-group-item">Role: {{ $user['role'] }}</li>
            <li class="list-group-item">Created: {{ $user['created_at'] }}</li>
            <li class="list-group-item">Updated: {{ $user['updated_at'] }}</li>
        </ul>
        <div class="mt-3">
            <a href="/user/edit/{{ $user['id'] }}" class="btn btn-primary">Edit</a>
            <form action="/user/{{ $user['id'] }}" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Delete</button>
            </form>
        </div>
    </div>
</div>

@endsection