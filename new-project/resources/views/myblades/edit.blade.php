<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    
</head>
<body>
    EDIT 
    <div class="container mt-3">
        <form action="{{ route('userupdate.update',$data) }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3 ">
                <img src=" {{ asset('uploads/myusers/'.$data->image) }} " alt="" style="width: 80px;"></div>
            <div class="mb-3 ">
                <input type="file" name='image' value="{{ asset('uploads/myusers/'.$data->image) }}"> </div>
            <div class="mb-3">
                <input type="text"  name="name" value="{{ $data->name }}"></div>
            <div class="mb-3 ">
                <input type="email"  name="email" value="{{ $data->email }}"> </div>
            <div class="mb-3 ">
                <input type="text" name='city' value="{{ $data->city }}"></div>
            <div  class="mb-3 "> 
                <button type="submit">SUBMIT</button> </div>
        </form>
    </div>
    <h3>
        @if(session()->has('msg'))
        {{ session()->get('msg') }}
    @endif
    </h3>

</body>
</html>