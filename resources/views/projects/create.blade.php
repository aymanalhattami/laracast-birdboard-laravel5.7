@extends('layouts.app')

@section('content')
<div class="bg-white p-4 rounded">
    <h1 class="h2 is-1 text-center mb-8">Create a Project</h1>

    <form action="/projects" method="POST">
        @include('projects.form', [
            'project' => new App\Project,
            'submitButton' => 'Add Project'
        ])
    </form>
</div>
@endsection
