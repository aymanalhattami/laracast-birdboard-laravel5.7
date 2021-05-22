@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-center w-full">
            <p class="text-gray text-sm font-normal">
                <a href="/projects" class="text-gray text-sm font-normal no-underline hover:no-underline">My Projects </a>
                <span>/ {{ $project->title }}</span>
            </p>
            <div>
                <a href="{{ $project->path() . '/edit' }}" class="btn btn-outline-secondary btn-sm rounded-2xl">Edit Project</a>
                <a href="/projects/create" class="btn btn-outline-primary btn-sm rounded-2xl">New Project</a>
            </div>
        </div>
    </header>

    <section>
        <div class="lg:flex -mx-3">
            <div class="lg:w-3/4 px-3 mb-6">
                <div class="mb-8 pb-4">
                    <h2 class="mb-3 text-lg text-gray font-normal">Tasks</h2>
                    <div class="bg-white p-4 rounded shadow-sm text-black font-bold mb-2">
                        <form action="{{ $project->path() . '/tasks' }}" method="POST">
                            @csrf
                            <input type="text" class="w-full" placeholder="Add New Task ..." name="body">
                        </form>
                    </div>
                    @forelse ($project->tasks as $task)
                        <div class="bg-white p-4 rounded shadow-sm text-black font-bold mb-2">
                            <form action="{{ $task->path() }}" method="POST">
                                @method('PATCH')
                                @csrf
                                <div class="flex items-center">
                                    <input name="body" type="text" class="w-full text-black {{ $task->completed ? 'text-gray-500' : '' }}" value="{{ $task->body }}">
                                    <input type="checkbox" name="completed" onchange="this.form.submit()" @if($task->completed) {{ "checked" }} @endif>
                                </div>
                            </form>
                        </div>
                    @empty
                    {{-- <div class="bg-white p-4 rounded shadow-sm text-black font-bold mb-2">
                        <form action="{{ $project->path() . '/tasks' }}" method="POST">
                            @csrf
                            <input type="text" class="w-full" name="body">
                        </form>
                    </div> --}}
                    @endforelse
                </div>

                <div class="">
                    <h2 class="mb-3 text-lg text-gray font-normal">General Notes</h2>
                    <form action="{{ $project->path() }}" method="POST">
                        @csrf
                        @method('PATCH')

                        @include('errors')

                        <textarea name="notes" class="w-full p-3 rounded" placeholder="Anything special that you want to make a note of ?">{{ $project->notes }}</textarea>
                        <button type="submit" class="btn btn-outline-primary btn-sm rounded-2xl mt-2">Save Project</button>
                    </form>
                </div>
            </div>

            <div class="lg:w-1/4 px-3">
                @include('projects.card')

                @include('projects.members')

                @can('manage', $project)
                    @include('projects.invite')
                @endcan

                @include('projects.activity.card')
            </div>


        </div>
    </section>
    {{-- <h3>{{ $project->title }}</h3>
    <p>{{ $project->description }}</p> --}}
@endsection
