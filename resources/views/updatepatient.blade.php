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
         <div class="row" style="margin-top:80px">
            <div class="col-md-4 col-md-offset-6">
               <h4>Update Patient <a href="{{ url('patients') }}" class="btn btn-sm btn-danger float-end">Back</a></h4><hr>
               
                
               <form action="{{ url('update_patient/'.$patient->id()) }}" method="POST">
                  @csrf
                 
               <div class="form-group">
                     <label>Name</label>
                     <input type="text" name="name" class="form-control"  value="{{ $patient['name']}}">
                     
                  </div>
                  <div class="form-group">
                     <label>Phone Number</label>
                     <input type="text" name="phoneno" class="form-control" value="{{ $patient['phoneno'] }}">
                     
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control"  value="{{ $patient['address'] }}">

               
                  <div class="form-group">
                     <label>Quarantine Day</label>
                     <input type="text" class="form-control" name="quarantine" placeholder="Qurantine Duration">
                     
                  </div> 
                  <div class="form-group">
                    <label>Radius</label>
                    <input type="text" class="form-control" name="radius" placeholder="Radius can Travel">
                  <br>
                  <button type="submit" name="register_btn" class="btn btn-block btn-primary">Update</button>
                  <br>
                  
               </form>
            </div>
         </div>
      </div>
    
</body>
</html>