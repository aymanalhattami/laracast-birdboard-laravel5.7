
@if(request()->is('projects'))
    <div class="bg-white p-4 rounded shadow-sm position-relative" style="height: 250px;">
        <h3 class="h3 py-3 pl-4 -ml-6 border-l-4 border-blue-400"><a class="no-underline hover:no-underline text-gray-900" href="{{ $project->path() }}">{{ Illuminate\Support\Str::limit(Illuminate\Support\Str::upper($project->title), 20, '...') }}</a></h3>
        <div class="mb-2">
            <p class="text-gray-500 text-justify">{{ Illuminate\Support\Str::limit($project->description, 150, '...') }}</p>
        </div>

        @can('manage', $project)
            <footer class="position-absolute" style="bottom: 20px;">
                <form action="{{ $project->path() }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm rounded-2xl" type="submit">Delete</button>
                </form>
            </footer>
        @endcan
    </div>
@else
    <div class="bg-white p-4 rounded shadow-sm position-relative">
        <h3 class="h4 py-3 pl-4 -ml-6 border-l-4 border-blue-400"><a class="no-underline hover:no-underline text-gray-900" href="{{ $project->path() }}">{{ Illuminate\Support\Str::upper($project->title) }}</a></h3>
        <div class="mb-5">
            <p class="text-gray-500 text-justify">{{ $project->description }}</p>
        </div>

        @can('manage', $project)
            <footer class="position-absolute" style="bottom: 20px;">
                <form action="{{ $project->path() }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm rounded-2xl" type="submit">Delete</button>
                </form>
            </footer>
        @endcan
    </div>
@endif
