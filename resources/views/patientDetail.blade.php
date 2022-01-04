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
               @if(session('message'))
                  <h4 class="alert alert-warning mb-2" >{{ session('message') }}</h4>
               @endif
               <h4>Patient Information </h4><hr>

               <form action="{{ url('update_patient/'.$patient->id()) }}" method="POST">
                  @csrf
                 
               <div class="form-group">
                     <label>Name</label>
                     <input type="text" name="name" class="form-control" name='name' value="{{ $patient['name']}}" readonly >
                     
                  </div>

                  <div class="form-group">
                     <label>email</label>
                     <input type="text" name="name" class="form-control"  value="{{ $patient['email']}}" readonly>
                     
                  </div>

                  <div class="form-group">
                     <label>Phone Number</label>
                     <input type="text" name="phoneno" class="form-control" value="{{ $patient['phoneno'] }}" readonly>
                     
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control"  name="address" value="{{ $patient['address'] }}">
                  </div>

                  <div class="form-group">
                     <label>Name</label>
                     <input type="text" name="name" class="form-control" name='name' value="{{ $patient['name']}}" readonly >
                     
                  </div>

                  <div class="form-group">
                    <label>Quarantine Location</label><br>
                    <input type="text" name="name" class="form-control" name='name' value="{{ $patient['Quarantine Location']}}" readonly ><br>
                    <input type="radio" id="maeps" name="quarantineLocation" value="MAEPS">
                    <label for="html">MAEPS, Serdang</label><br>
                    <input type="radio" id="sgbuloh" name="quarantineLocation" value="Hosp Sungai Buloh">
                    <label for="css">Hospital Sungai Buloh</label><br>
                  </div>
               
                  <div class="form-group">
                     <label>Start Date</label>
                     <input type="date" class="form-control" name="startD" value="{{ $patient['startD'] }}">
               
                  <div class="form-group">
                     <label>Start Date</label>
                     <input type="date" class="form-control" name="startD"  value="{{ $patient['startD'] }}" readonly>
                     
                  </div> 
                  <div class="form-group">
                     <label>End Date</label>
                     <input type="date" class="form-control" name="endD" value="{{ $patient['endD'] }}">
                     
                  </div> 
                  <div class="form-group">
                     <label>Quarantine Day</label>
                     <input type="number" class="form-control" name="quarantineDuration" value="{{ $patient['quarantineDuration'] }}">
                     
                  </div> 
                  <br>
                  <a href="{{ url('patients') }}" class="btn btn-sm btn-danger float-end">Back</a>
                  <button type="submit" name="register_btn" class="btn btn-success">Update</button>
                  <br>
                  
               </form>
            </div>
         </div>
      </div>
    
</body>
</html>
@endsection