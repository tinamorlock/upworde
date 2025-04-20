@extends('layouts.app')

@section('title', $upword->title)

@section('content')
    <div class="container py-5">
        <h2 class="text-contrast mb-4">{{ $upword->title }}</h2>

        <p class="text-light-custom">
            <strong>Status:</strong> {{ $upword->status }}
        </p>

        @if ($upword->description)
            <p class="text-light-custom mt-3">
                <strong>Description:</strong><br>
                {{ $upword->description }}
            </p>
        @endif
        <div class="mt-4">
            <a href="{{ route('upwords.index') }}" class="text-contrast small">&larr; Back to All Projects</a>
        </div>

        <div class="mt-5 d-flex gap-3">
            <a href="{{ route('upwords.edit', $upword->id) }}" class="btn btn-upworde-outline">Edit</a>

            <form action="{{ route('upwords.destroy', $upword->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-upworde">Delete</button>
            </form>
        </div>
    </div>
@endsection
