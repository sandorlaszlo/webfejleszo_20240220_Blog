<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My blog</title>
</head>
<body>
    <h1>Posts</h1>

    @foreach ($posts as $post)
        <article>
            <h2><a href="posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
            <p>{{ $post->date }}</p>

            {!! $post->body !!}
        </article>
    @endforeach

</body>
</html>