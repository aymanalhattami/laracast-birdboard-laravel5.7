@if($errors->{ $bag ?? 'default' }->any())
    <div class="text-danger mb-4">
        <ul>
            @foreach ($errors->{ $bag ?? 'default' }->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
