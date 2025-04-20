@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
    <div class="container py-5" style="max-width: 600px;">
        <h2 class="text-contrast mb-4">Edit Project</h2>

        <form action="{{ route('upwords.update', $upword->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-3">
                <label for="title" class="form-label text-light-custom">Title</label>
                <input id="title" name="title" type="text" class="form-control" value="{{ old('title', $upword->title) }}" required>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label text-light-custom">Description (optional)</label>
                <textarea id="description" name="description" class="form-control" rows="4">{{ old('description', $upword->description) }}</textarea>
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label for="status" class="form-label text-light-custom">Status</label>
                <select id="status" name="status" class="form-select" required>
                    @foreach (['submitted', 'pending', 'editing', 'completed'] as $status)
                        <option value="{{ $status }}" {{ $upword->status === $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-upworde">Save Changes</button>
        </form>
    </div>
@endsection
