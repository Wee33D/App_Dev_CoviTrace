@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
<body>

<div class="container">
         <div class="row" style="margin-top:30px">
            <div class="col-md-4 col-md-offset-6">
               <h4>Admin Information </h4><hr>

               <form action="{{ url('update_admin/'.$admin->id()) }}" method="POST">
                  
               @if(Session::get('success'))
                  <div class="alert alert-success">
                     {{ Session::get('success') }}
                  </div>
               @endif

               @if(Session::get('fail'))
                  <div class="alert alert-danger">
                     {{ Session::get('fail') }}
                  </div>
               @endif
                  @csrf
                 
               <div class="form-group">
                     <label>First Name</label>
                     <input type="text" class="form-control" name='first_name' value="{{ $admin['first_name']}}">
                     
                  </div>

                  <div class="form-group">
                     <label>Last Name</label>
                     <input type="text"  class="form-control" name='last_name' value="{{ $admin['last_name']}}">
                     
                  </div>

                  <div class="form-group">
                     <label>Email</label>
                     <input type="text"  class="form-control" name='email' value="{{ $admin['email']}}" readonly>
                     
                  </div>
                     
      
                  <br>
                  <a href="{{ url('register1') }}" class="btn btn-sm btn-danger float-end">Back</a>
                  <button type="submit" name="register_btn" class="btn btn-primary">Update</button>
                  <br>
                  
               </form>
            </div>
         </div>
      </div>
    
</body>
</html>
@endsection