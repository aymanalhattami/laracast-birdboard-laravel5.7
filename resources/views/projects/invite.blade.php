<div class="bg-white p-4 rounded shadow-sm position-relative mt-4">
    <h3 class="h3 py-3 pl-4 -ml-6 border-l-4">Invite a User</h3>
    {{-- <div class="mb-2">
        <p class="text-gray-500 text-justify">{{ Illuminate\Support\Str::limit($project->description, 150, '...') }}</p>
    </div> --}}

    <form action="{{ $project->path() . '/invitations' }}" method="post">
        @csrf

        @include('errors', ['bag' => 'invitations'])

        <input type="email" name="email" placeholder="Email Address" class="w-full py-1 px-2 mb-3 border-2 rounded-2xl">
        <button class="btn btn-outline-primary btn-sm rounded-2xl" type="submit">Invite</button>
    </form>
</div>
