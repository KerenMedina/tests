@foreach($posts as $post)

    {{ $post->title }}
    {{ str_limit($post->body) }}
    <a href="/post/{{$post->id}}">View Post Details</a>

@endforeach

