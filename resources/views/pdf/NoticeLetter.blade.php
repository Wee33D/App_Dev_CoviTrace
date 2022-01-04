@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notice Letter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top:30px">
           <div class="col-md-4 col-md-offset-6">
            @if(session('message'))
            <h4 class="alert alert-warning mb-2" >{{ session('message') }}</h4>
         @endif
              <h4>Letter Info </h4><hr>

              <form action="{{ url('submit_pdf/'.$pdf->id()) }}" method="POST">
                 @csrf
                
              <div class="form-group">
                    <label>Name : </label>
                    <input type="text" class="form-control" name='name' value="{{ $pdf['name']}}" readonly >
                    
                 </div>
                 <div class="form-group">
                  <label>Email : </label>
                  <input type="text"  class="form-control" name='email' value="{{ $pdf['email']}}" readonly >
                  
               </div>

                 <div class="form-group">
                    <label>Date Quarantine End :</label>

                    <input type="datetime" name="endD" class="form-control"  value="{{ $pdf['endD']}}" readonly>

                 </div>

                 <div>
                    Letter : <textarea name="letter" rows="10" cols="55"> {{ $pdf["letter"] }}</textarea>
                 </div>

                 
                 <br>
                 <a href="{{ url('patients') }}" class="btn btn-sm btn-danger float-end">Back</a>
                 <button type="submit" name="generate_btn" class="btn btn-success">Generate</button>
                 
                 <br>
                 
              </form>
           </div>
        </div>
     </div>
</body>
</html>

@endsection