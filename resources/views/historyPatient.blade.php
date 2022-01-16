@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en" class="page">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Manage Patient</title>
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">   

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-red.css">

</head>

<body>
    <div class="container" style="margin-top: 30px;">

        <h3 class="text-center">History </h3><br>
      
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <!-- <th>Phone No.</th>
                <th>NRIC</th> -->
                <th class="text-center">Quarantine Duration</th>
                <th class="text-center" width="180">Start Date</th>
                <th class="text-center" width="180">End Date</th>
            </tr>
            @php $i=1; @endphp
            @forelse($history as $list)
            <tr>
                <td>{{$i++}}</td>
                <td class="text-center">{{$list->data()['name']}}</td>
                <td class="text-center">{{$list->data()['email']}}</td>
                <!-- <td>{{$list->data()['phoneno']}}</td> -->
                <!-- <td>{{$list->data()['ic']}}</td> -->
                <td class="text-center">{{$list->data()['quarantineDuration']}}</td>
                <td class="text-center">{{$list->data()['startD']}} </td>
                <td class="text-center">{{$list->data()['endD']}} </td>
                <td><a href="{{ url('viewL/'.$list->id()) }}" type="button" class="btn btn-primary btn-update">View Letter</a>
                
                
            </tr>
            @empty
            <tr>
                <td>No record found</td>
            </tr>
            @endforelse
            <tbody id="tbody">
    
            </tbody>
        </table>
    </div>

</body>
</html>
@endsection

