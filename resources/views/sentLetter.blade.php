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
               <h4>Referral Letter </h4><hr>

               <div class="form-group">
                     <label>To:</label>
                     <input type="text" name="name" class="form-control" name='name' value="{{ $patient['email']}}" readonly >
                </div>

                <div class="form-group">
                     <label>From:</label>
                     <input type="text" name="name" class="form-control" name='name' value="covitraceapp@gmail.com" readonly >
                </div>

                <div class="column">
                    <div class="address">
                     <h5>{{ $patient['address']}}</h5>
                    </div><br>
                    
                    <div class="content">
                        <h3>Subject: Quarantine Notice Letter</h3>
                     <h1>Dear {{ $patient['name']}},</h1>
                     <h1>Your quarantine period will end on <b>{{ $patient['endD']}}</b>.
                     <h1>{{ $patient['letter']}}</h1> 
                    <br>
                     <h2>Best Regards,</h2> 
                     <h2>CoviTrace Healthcare Authority.</h2>
                    </div>

            </div>
            <br>
            <a href="{{ url('history') }}" class="btn btn-sm btn-danger float-end">Back</a>
   
  
  
  
   
</div>
         </div>
      </div>
      
    
</body>

<style>
    .address{
        width: 150px;
        height: 50px;
        /* position: absolute; */
        /* right: 150px; */
        
        /* margin-right: 100px; */
        margin-left: 200px;
    }

    .content{
        position: relative;
    }

     h5{
        font-size: 12px;
        text-align: justify;
    }

    h3{
        font-size: 15px;
        

    }
    h2{
        font-size: 12px;
        font-style: italic;

    }

    h1{
        font-size: 12px;

    }
     .column {
  width: 100%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
  border-style: solid;
}


      
    </style>

</html>
@endsection