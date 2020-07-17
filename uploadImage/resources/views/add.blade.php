<html>
<head>
    <title>create</title>
</head>
<body>
<p>Create User</p>
<form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Name:</label>
    <input type="text" name="name" placeholder="insert name">
    <label>Email:</label>
    <input type="text" name="email" placeholder="insert email">
    <label>Country</label>
    <input type="text" name="country" placeholder="insert country">
    <label>Image</label>
    <input type="file" name="image">
    <button type="submit" >Submit</button>
</form>
</body>
</html>