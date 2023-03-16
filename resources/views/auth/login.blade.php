@extends('layout/main')

@section('content')
<div class="row">
    <div class="col col-md-6">
        <h1 class="h3 mb-3">{{ $title }}</h1>
        <div class="card shadow-sm">
            <div class="card-body">
                @if(session()->has('loginFail'))
                    <div class="alert alert-danger mb-3" role="alert">
                        {{ session()->get('loginFail') }}
                    </div>
                @endif
                <form action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" required>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection