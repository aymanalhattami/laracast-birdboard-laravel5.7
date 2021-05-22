@csrf

@if($errors->any())
    <div class="text-danger mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="field">
    <label for="title" class="label">Title</label>
    <div class="control">
        <input type="text" class="input" name="title" value="{{ $project->title }}" placeholder="Title">
    </div>
</div>

<div class="field">
    <label for="description" class="label">Description</label>
    <div class="control">
        <textarea name="description" id="description" class="textarea" placeholder="Description">{{ $project->description }}</textarea>
    </div>
</div>

<div class="field mt-4">
    <div class="control flex items-center">
        <button type="submit" class="btn btn-outline-primary btn-sm rounded-2xl">{{ $submitButton }}</button>
        <a href="/projects" class="ml-2 hover:no-underline text-gray-600">Cancel</a>
    </div>
</div>
