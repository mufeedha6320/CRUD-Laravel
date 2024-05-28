<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <title>new</title>
</head>
<body>
    <h3>
        @if(session()->has('msg'))
        {{ session()->get('msg') }}
    @endif
    </h3>
    <h1>ADD new user details</h1>
    <div class="container mt-3">
    <form action="{{ route('userstore') }}" enctype="multipart/form-data" method="post">
         @csrf
         <div class="mb-3 ">
        <input type="file" name='image'> </div>
        <div class="mb-3">
        <input type="text" placeholder="Name" name="name"></div>
        <div class="mb-3 ">
        <input type="email" placeholder="email" name="email"> </div>
        <div class="mb-3 ">
        <input type="text" placeholder="city" name='city'></div>
    
        <div  class="mb-3 "> 
                <button type="submit">SUBMIT</button> </div>
        <div  class="mb-3 ">
                <button><a href="{{ route('mytable')}}">Show List Of Users</a></button> </div>
    </form>
    </div>
    
</body>
</html>