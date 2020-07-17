<html>
<head>
    <title>edit</title>
</head>
<body>
<p>Update User</p>
<form action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label>Name:</label>
    <input type="text" name="name" value="{{$user->name}}" placeholder="insert name">
    <label>Email:</label>
    <input type="text" name="email" value="{{$user->email}}" placeholder="insert email">
    <label>Country</label>
    <input type="text" name="country" value="{{$user->country}}" placeholder="insert country">
    <label>Image</label>
    <input type="file" name="image">
    <button type="submit" >Submit</button>
</form>
</body>
</html>