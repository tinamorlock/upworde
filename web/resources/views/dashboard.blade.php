@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid py-4">
        @php $user = auth()->user(); @endphp

        @if ($user->role?->name === 'client')
            <!-- Desktop Layout -->
            <div class="row d-none d-md-flex">
                <!-- Column 1: Recent Upwords + New Project -->
                <div class="col-lg-3 mb-4 px-3">
                    <div class="text-center mb-3">
                        <a href="#" class="btn btn-upworde btn-sm">+ New Project</a>
                    </div>
                    <h5 class="mb-3 text-center text-contrast">Recent Projects</h5>
                    @if ($user->upwords && $user->upwords->count())
                        <ul class="list-group">
                            @foreach ($user->upwords->take(5) as $upword)
                                <li class="list-group-item upworde-light-text">
                                    <strong>{{ $upword->title }}</strong><br>
                                    <small>Status: {{ $upword->status }}</small>
                                </li>
                            @endforeach
                        </ul>
                        @if ($user->upwords->count() > 5)
                            <div class="mt-2">
                                <a href="{{ route('upwords.index') }}" class="text-contrast small">View All Projects</a>
                            </div>
                        @endif
                    @else
                        <p class="upworde-light-text">You haven’t submitted any projects yet.</p>
                    @endif
                </div>

                <!-- Column 2: Status Feed -->
                <div class="col-lg-6 mb-4 px-3 upworde-light-text">
                    <div class="d-none d-lg-block" style="margin-top: 50px;"></div>
                    <h5 class="mb-3 text-center text-contrast">Project Status Updates</h5>
                    @if ($user->statusUpdates && $user->statusUpdates->count())
                        @foreach ($user->statusUpdates->sortByDesc('created_at')->take(10) as $update)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <p class="mb-1">{{ $update->message }}</p>
                                    <small>{{ $update->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No updates yet. Once your projects are in progress, you’ll see updates here.</p>
                    @endif
                </div>

                <!-- Column 3: Profile, Uploads, Editor -->
                <div class="col-lg-3 mb-4">
                    <!-- Profile Summary -->
                    <div class="card upworde-card text-center mb-5">
                        <div class="card-body">
                            <img src="{{ asset('images/default-avatar.png') }}" alt="Profile Photo" class="rounded-circle mb-2" width="80" height="80">
                            <h6 class="mb-1 text-center">{{ $user->first_name }} {{ $user->last_name }}</h6>
                            <a href="{{ route('profile.edit') }}" class="text-contrast small">Edit Profile</a>
                        </div>
                    </div>

                    <!-- Open Uploads -->
                    <div class="card upworde-card mb-5">
                        <div class="card-body">
                            <h6 class="card-title text-center">Files Being Edited</h6>
                            @if ($user->uploads && $user->uploads->where('status', 'editing')->count())
                                <ul class="list-unstyled">
                                    @foreach ($user->uploads->where('status', 'editing')->take(5) as $upload)
                                        <li class="mb-1">
                                            <strong class="text-light-custom">{{ $upload->filename }}</strong><br>
                                            <small class="text-light-custom">{{ $upload->created_at->format('M j') }}</small>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="mb-0 upworde-light-text">No active uploads.</p>
                            @endif
                        </div>
                    </div>

                    <!-- About Your Editor -->
                    <div class="card upworde-card">
                        <div class="card-body">
                            <h6 class="card-title text-center">Your Editor</h6>
                            @if ($user->editor)
                                <p class="mb-1 upworde-light-text"><strong>{{ $user->editor->first_name }} {{ $user->editor->last_name }}</strong></p>
                                <small class="text-light-custom">{{ $user->editor->email }}</small>
                            @else
                                <p class="mb-0 upworde-light-text">An editor will be assigned after your first submission.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Layout -->
            <div class="d-md-none">
                <!-- Profile Edit Link -->
                <div class="mb-4 text-center">
                    <a href="{{ route('profile.edit') }}" class="btn btn-upworde-outline">Edit Your Profile</a>
                </div>

                <!-- Upwords -->
                <div class="mb-4">
                    <h5 class="mb-3 text-contrast">Your Projects</h5>
                    @if ($user->upwords && $user->upwords->count())
                        <ul class="list-group">
                            @foreach ($user->upwords->take(5) as $upword)
                                <li class="list-group-item">
                                    <strong class="text-light-custom">{{ $upword->title }}</strong><br>
                                    <small class="text-light-custom">Status: {{ $upword->status }}</small>
                                </li>
                            @endforeach
                        </ul>
                        @if ($user->upwords->count() > 5)
                            <div class="mt-2">
                                <a href="{{ route('upwords.index') }}" class="text-contrast small">View All Projects</a>
                            </div>
                        @endif
                    @else
                        <p class="text-light-custom">You haven’t submitted any projects yet.</p>
                    @endif
                </div>

                <!-- Uploads -->
                <div class="mb-4">
                    <h5 class="mb-3 text-contrast">Files Being Edited</h5>
                    @if ($user->uploads && $user->uploads->where('status', 'editing')->count())
                        <ul class="list-group">
                            @foreach ($user->uploads->where('status', 'editing')->take(5) as $upload)
                                <li class="list-group-item">
                                    <strong class="text-light-custom">{{ $upload->filename }}</strong><br>
                                    <small class="text-light-custom">{{ $upload->created_at->format('M j') }}</small>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-light-custom">No active uploads.</p>
                    @endif
                </div>

                <!-- Status Feed -->
                <div class="mb-4">
                    <h5 class="mb-3 text-contrast">Status Updates</h5>
                    @if ($user->statusUpdates && $user->statusUpdates->count())
                        @foreach ($user->statusUpdates->sortByDesc('created_at')->take(10) as $update)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <p class="mb-1 text-light-custom">{{ $update->message }}</p>
                                    <small class="text-light-custom">{{ $update->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-light-custom">No updates yet.</p>
                    @endif
                </div>

                <!-- Editor Info -->
                <div class="mb-4">
                    <h5 class="mb-3 text-contrast">Your Editor</h5>
                    @if ($user->editor)
                        <p class="text-light-custom"><strong>{{ $user->editor->first_name }} {{ $user->editor->last_name }}</strong><br>
                            <small class="text-light-custom">{{ $user->editor->email }}</small></p>
                    @else
                        <p class="text-light-custom">An editor will be assigned after your first submission.</p>
                    @endif
                </div>
            </div>
        @else
            <div class="alert alert-info">
                Dashboard for your role is coming soon.
            </div>
        @endif
    </div>
@endsection
