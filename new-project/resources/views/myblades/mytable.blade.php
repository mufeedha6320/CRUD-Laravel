<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mytable</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> 

<link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css.css">

</head>
<body> 
    <h1>USER DETAILS</h1> 
    <h3 style="color: red;">
        @if(session()->has('msg'))
        {{ session()->get('msg') }}
    @endif
    </h3>
    <a href="{{ route('newregister') }}" class="btn btn-dark float-right"> ADD </a>
    <table id="user1" class="table table-hover ">
      <thead>
        <tr>
          <th>Item ID</th>
          <th> Image</th>
          <th> Name</th>
          <th> Email</th>
          <th> Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $i)
        <tr>
          <td>{{ $loop->iteration}}</td>
          <td> <img src=" {{ asset('uploads/myusers/'.$i->image) }} " alt="" style="width: 80px;"></td>
          <td>{{$i->name }}</td>
          <td>{{$i->email }}</td>
          <td>
            <a href="{{ route('userupdate.edit', $i->id) }}" class="btn btn-primary"> EDIT </a>
            <a href="{{ route('userdelete', $i->id) }}" class="btn btn-danger"> DELETE </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table> 


    
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src ="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
      $(document).ready(function() {
    $('#user1').DataTable( );
} );
    </script>
</html>