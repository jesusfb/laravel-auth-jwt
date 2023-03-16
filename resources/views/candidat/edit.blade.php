@extends('layout/main')

@section('content')
@php
    // Check if session old skills
    $myskills = '';
    if(old('skills')) {
        $myskills = implode(',', old('skills'));
    }
@endphp
<h1 class="h3">{{ $title }}</h1>
<div class="row">
    <div class="col col-md-6">
        <form action="/candidat/edit/{{ $candidat['id'] }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $candidat['name']) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="education" class="form-label">Education</label>
                <input type="text" name="education" class="form-control @error('education') is-invalid @enderror" id="education" value="{{ old('education', $candidat['education']) }}">
                @error('education')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="birthday" class="form-label">Birthday</label>
                <input type="date" name="birthday" class="form-control @error('birthday') is-invalid @enderror" id="birthday" value="{{ old('birthday', $candidat['birthday']) }}">
                @error('birthday')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="experience" class="form-label">Experience</label>
                <div class="input-group">
                    <input type="number" name="experience" class="form-control @error('experience') is-invalid @enderror" id="experience" value="{{ old('experience', $candidat['experience']) }}">
                    <span class="input-group-text">Years</span>
                    @error('experience')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="last_position" class="form-label">Last Position</label>
                <input type="text" name="last_position" class="form-control @error('last_position') is-invalid @enderror" id="last_position" value="{{ old('last_position', $candidat['last_position']) }}">
                @error('last_position')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="applied_position" class="form-label">Applied Position</label>
                <input type="text" name="applied_position" class="form-control @error('applied_position') is-invalid @enderror" id="applied_position" value="{{ old('applied_position', $candidat['applied_position']) }}">
                @error('applied_position')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="skills" class="form-label">Skills</label>
                <div class="row">
                    <div class="col col-md-6">
                        <div class="form-check">
                            <input name="skills[]" class="form-check-input" type="checkbox" value="PHP" id="PHP" @if(str_contains(old($myskills, $candidat['skills']), 'PHP')) checked @endif>
                            <label class="form-check-label" for="PHP">
                                PHP
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="skills[]" class="form-check-input" type="checkbox" value="Javascript" id="Javascript" @if(str_contains(old($myskills, $candidat['skills']), 'Javascript')) checked @endif>
                            <label class="form-check-label" for="Javascript">
                                Javascript
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="skills[]" class="form-check-input" type="checkbox" value="Pyton" id="Pyton" @if(str_contains(old($myskills, $candidat['skills']), 'Pyton')) checked @endif>
                            <label class="form-check-label" for="Pyton">
                                Pyton
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="skills[]" class="form-check-input" type="checkbox" value="GoLang" id="GoLang" @if(str_contains(old($myskills, $candidat['skills']), 'GoLang')) checked @endif>
                            <label class="form-check-label" for="GoLang">
                                GoLang
                            </label>
                        </div>
                    </div>
                    <div class="col col-md-6">
                        <div class="form-check">
                            <input name="skills[]" class="form-check-input" type="checkbox" value="Mysql" id="Mysql" @if(str_contains(old($myskills, $candidat['skills']), 'Mysql')) checked @endif>
                            <label class="form-check-label" for="Mysql">
                                Mysql
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="skills[]" class="form-check-input" type="checkbox" value="MongoDB" id="MongoDB" @if(str_contains(old($myskills, $candidat['skills']), 'MongoDB')) checked @endif>
                            <label class="form-check-label" for="MongoDB">
                                MongoDB
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="skills[]" class="form-check-input" type="checkbox" value="PosgresSQL" id="PosgresSQL" @if(str_contains(old($myskills, $candidat['skills']), 'PosgresSQL')) checked @endif>
                            <label class="form-check-label" for="PosgresSQL">
                                PosgresSQL
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="skills[]" class="form-check-input" type="checkbox" value="Ruby" id="Ruby" @if(str_contains(old($myskills, $candidat['skills']), 'Ruby')) checked @endif>
                            <label class="form-check-label" for="Ruby">
                                Ruby
                            </label>
                        </div>
                    </div>
                </div>  
                <input type="hidden" class="form-control @error('skills') is-invalid @enderror">
                @error('skills')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email', $candidat['email']) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone', $candidat['phone']) }}">
                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="resume" class="form-label">Resume</label>
                <input type="file" name="resume" class="form-control @error('resume') is-invalid @enderror" id="resume">
                <div class="form-text mt-1"><a href="{{ asset('storage/' . $candidat['resume']) }}" class="text-decoration-none" target="_blank">Preview</a></div>
                @error('resume')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-1">Submit</button>
        </form>
    </div>
</div>

@endsection