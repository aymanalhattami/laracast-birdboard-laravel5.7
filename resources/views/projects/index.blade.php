<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <ul>
            @forelse ($projects as $item)
                <li><a href="{{ $item->path() }}">{{ $item->title }}</a></li>
            @empty
                <li>No Items found</li>
            @endforelse
        </ul>
    </div>
</body>
</html>
