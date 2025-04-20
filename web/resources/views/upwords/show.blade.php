@extends('layouts.app')

@section('title', $upword->title)

@section('content')
    <div class="container py-5">
        <h2 class="text-contrast mb-4">{{ $upword->title }}</h2>



        @if ($upword->description)
            <p class="text-light-custom mt-3">
                <strong>Description:</strong><br><br>
                <em>{{ $upword->description }}</em>
            </p>
        @endif
        <div class="mt-4">
            <a href="{{ route('upwords.index') }}" class="text-contrast small">&larr; Back to All Projects</a>
        </div><br>
        <div class="mt-3">
            <a href="#" class="btn btn-upworde btn-sm">+ Upload File</a>
        </div>
        <h6 class="mt-5">Project Files</h6>
        @if ($upword->uploads && $upword->uploads->count())
            <ul class="list-unstyled mt-3">
                @foreach ($upword->uploads as $upload)
                    <li class="mb-2">
                        <strong class="text-light-custom">{{ $upload->filename }}</strong><br>
                        <small class="text-light-custom">{{ $upload->created_at->format('M j, Y') }}</small>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-light-custom mt-3">No files have been uploaded to this project yet.</p>
        @endif
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
