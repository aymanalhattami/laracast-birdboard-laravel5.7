@extends('layouts.app')

@section('content')
<div class="bg-white p-4 rounded">
    <h1 class="h2 is-1 text-center mb-8">Let's update the project</h1>

    <form action="{{ $project->path() }}" method="POST">
        @method('PATCH')
        @include('projects.form', [
            'submitButton' => 'Update Project'
        ])
    </form>
</div>
@endsection
