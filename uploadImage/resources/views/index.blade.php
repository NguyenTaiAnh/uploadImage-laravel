<html>
<head>
    <title>abc</title>
</head>
<body>
<h1>Todo</h1>
<p><a href={{route('user.create')}}>add todo</a></p>
<table>
    <tr>
        <th>name</th>
        <th>email</th>
        <th>country</th>
        <th>image</th>
        <th>caption</th>
    </tr>
    @foreach($user as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->country}}</td>
            <td style="width: 30%"><img src="/assets/images/{{$user->image}}" style="width: 20%;"></td>
            <td>
                <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                    <a href="{{route('user.show',$user->id)}}">Show</a>
                    <a href="{{route('user.edit',$user->id)}}">edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>

    @endforeach
</table>
</body>
</html>
