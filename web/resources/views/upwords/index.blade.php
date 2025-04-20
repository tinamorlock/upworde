@extends('layouts.app')

@section('title', 'All Projects')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-contrast">All Projects</h2>
            <a href="{{ route('upwords.create') }}" class="btn btn-upworde btn-sm">+ New Project</a>
        </div>

        @if ($upwords->count())
            <ul class="list-unstyled">
                @foreach ($upwords as $upword)
                    <li class="mb-3 d-flex justify-content-between align-items-start border-bottom pb-2">
                        <div>
                            <div>
                                <a href="{{ route('upwords.show', $upword->id) }}" class="text-light-custom">
                                    <strong>{{ $upword->title }}</strong>
                                </a>
                            </div>                        </div>
                        <div class="ms-2 d-flex gap-2">
                            <!-- upload icon -->
                            <a href="#" title="Upload File" class="text-light-custom up-icon-padding">
                                <i data-lucide="folder-plus" style="color: var(--light);"></i>
                            </a>
                            <a href="{{ route('upwords.edit', $upword->id) }}" title="Edit" class="up-icon-padding"">
                                <i data-lucide="pencil" style="color: var(--light);"></i>
                            </a>
                            <form action="{{ route('upwords.destroy', $upword->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="border-0 bg-transparent p-0">
                                    <i data-lucide="trash-2" style="color: var(--contrast);"></i>
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-light-custom">You haven’t created any projects yet.</p>
        @endif
    </div>
@endsection
