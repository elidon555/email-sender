@foreach($users as $user)
    <h5>{{$user->name}} has written:</h5>
    <ul>
        @foreach($user->posts as $post)
            <li>{{$post->title}}</li>
        @endforeach
    </ul>
    <br>
@endforeach