@extends('layouts.app')

@section('title', 'Start a New Project')

@section('content')
    <div class="container py-5" style="max-width: 600px;">
        <h2 class="mb-4 text-center text-contrast">Start a New Project</h2>

        <form method="POST" action="{{ route('upwords.store') }}">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label text-contrast">Project Title</label>
                <input type="text" name="title" id="title"
                       class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title') }}" required>
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="form-label text-contrast">Description (optional)</label>
                <textarea name="description" id="description"
                          class="form-control @error('description') is-invalid @enderror"
                          rows="4">{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-upworde">Create Project</button>
            </div>
        </form>
    </div>
@endsection
