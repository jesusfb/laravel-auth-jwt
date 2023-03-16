@extends('layout/main')

@section('content')
@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session()->get('success') }}
</div>
@endif
<h1 class="h3">{{ $title }}</h1>
<a href="/candidat/create" class="btn btn-primary mb-3">Create Candidat</a>
<div class="table-responsive">
    <table class="table table-bordered text-center text-nowrap">
        <thead class="bg-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                {{-- <th scope="col">Education</th>
                <th scope="col">Birthday</th> --}}
                <th scope="col">Experience</th>
                <th scope="col">Last Position</th>
                <th scope="col">Applied Position</th>
                {{-- <th scope="col">Skills</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Resume</th> --}}
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($candidats as $candidat)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td><a href="/candidat/{{ $candidat['id'] }}" class="text-decoration-none">{{ $candidat['name'] }}</a></td>
                {{-- <td>{{ $candidat['education'] }}</td>
                <td>{{ $candidat['birthday'] }}</td> --}}
                <td>{{ $candidat['experience'] }} years</td>
                <td>{{ $candidat['last_position'] }}</td>
                <td>{{ $candidat['applied_position'] }}</td>
                {{-- <td>{{ $candidat['skills'] }}</td>
                <td>{{ $candidat['email'] }}</td>
                <td>{{ $candidat['phone'] }}</td>
                <td>{{ $candidat['resume'] }}</td> --}}
                <td>{{ $candidat['created_at'] }}</td>
                <td>{{ $candidat['updated_at'] }}</td>
                <td>
                    <a href="/candidat/edit/{{ $candidat['id'] }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="/candidat/{{ $candidat['id'] }}" method="POST" class="d-inline">
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