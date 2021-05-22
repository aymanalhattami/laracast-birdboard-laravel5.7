@extends('layouts.app')

@section('content')
    <header class="bg-red flex items-ends mb-4">
        <h1 class="mr-auto text-gray-600">My Projects</h1>
        <a class="btn btn-outline-primary btn-sm rounded-2xl px-3" href="{{ url('projects/create') }}">Create New Project</a>
    </header>
    <main class="lg:flex lg:flex-wrap -mx-3">
        @forelse ($projects as $project)
        <div class="lg:w-1/3 px-2 pb-6">
            @include('projects.card')
        </div>
        @empty
            <div>No Items found</div>
        @endforelse
    </main>
@endsection
