<!DOCTYPE html>
<html lang="en" class="page">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Manage Patient</title>
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">   

        {{-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-red.css"> --}}

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container" style="margin-top: 50px;">
        <div class="row" style="margin-top:80px">

        <h3 class="text-center">Track Patients </h3><br>
    
    
        
        <h4> Patient List</h4>
        <h6>Total patient: {{ $patient->size() }}</h6>
        <table class="table table-bordered">
            <tr>
                
                <th>Name</th>
                <th>Email</th>
                <th>Phone No.</th>
                <th width="180" class="text-center">Location</th>
            </tr>
            @foreach($patient as $list)
            @if ($list)
                
            @endif
            <tr>
                
                <td>{{$list->data()['name']}}</td>
                <td>{{$list->data()['email']}}</td>
                <td>{{$list->data()['phoneno']}}</td>
                <td> </td>
            </tr>
            @endforeach
            <tbody id="tbody">
    
            </tbody>
        </table>
        
    </div>
</div>
</body>
</html>


