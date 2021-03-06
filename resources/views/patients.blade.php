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

<style>
    .history{
        text-align: right;
    }
    </style>

</head>

<body>
    <div class="container" style="margin-top: 30px;">

        <h3 class="text-center"><b>Manage Patient</b> </h3><br>
        @if(session('messageD'))
                  <h4 class="alert alert-warning mb-2" >{{ session('messageD') }}</h4>
               @endif
        

        <div class="history">
             <a href="/history" type="button" style="text-align: right;" class="btn btn-primary btn-success ">HISTORY</a>
       </div>

        <h4> <b>Patient List</b> </h4>
        <h6>Total patient: {{ $patient->size() }}</h6>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone No.</th>
                <th>Address </th>
                <th width="180">Quarantine Day</th>
                <th width="250" class="text-center">Action</th>
            </tr>
            @php $i=1; @endphp
            @forelse($patient as $list)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$list->data()['name']}}</td>
                <td>{{$list->data()['phoneno']}}</td>
                <td>{{$list->data()['address']}}</td>
                <td class="text-center">{{$list->data()['quarantineDuration']}} </td>
                <td>  <a href="{{ url('viewP/'.$list->id()) }}" type="button"  class="btn btn-primary btn-update" >View</a>
                    <a href="{{ url('generateP/'.$list->id()) }}" type="button"  class="btn btn-primary btn-success" >Letter </a>
                    <a href="{{ url('deleteP/'.$list->id()) }}" type="button" class="btn btn-primary btn-danger ">DEL</a></td>
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

