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

        {{-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-red.css"> --}}

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container" style="margin-top: 30px;">
        <div class="row" style="margin-top:80px">

        <h3 class="text-center">Track Patients </h3><br>
    
            
        
        <h4> Patient List</h4>
        <h6>Total patient: {{ $patient->size() }}</h6>
        <table class="table table-bordered">

            
            
            
            <tr>
                <th class="text-center">Number</th>
                <th class="text-center">Name</th>
                <th class="text-center">Phone No.</th>
                <th class="text-center">Address </th>
                <th width="180" class="text-center">Quarantine Location</th>
                <th width="180" class="text-center">Status</th>
                <th width="180" class="text-center">Days Left</th>
            </tr>
            @php $i=1; @endphp
            @foreach($patient as $list)
                @if ($list)
                @endif
                <tr>
                    
                    <td>{{$i++}}</td>
                    <td>{{$list->data()['name']}}</td>
                    <td >{{$list->data()['phoneno']}}</td>
                    <td>{{$list->data()['address']}}</td>
                    <td class="text-center">{{$list->data()['Quarantine Location']}}</td>
                    <td class="text-center">

                    <?php 
                    $quarantine=$list->data()['Quarantine Location'];
                    $patientlat=$list->data()['latitude'];
                    $patientlong=$list->data()['longitude'];

                    if($quarantine=="MAEPS"){
                        $qlat=2.9794;
                        $qlong=101.6977;
                        $minlat = 2.9794-0.00539957;
                        $minlong = 101.6977-0.00539957;
                        $maxlat = 2.9794+0.00539957;
                        $maxlong = 101.6977+0.00539957;

                        $p = 0.017453292519943295;
                            // $c = cos;
                            $a = 0.5 - cos(($qlat - $patientlat) * $p)/2 + 
                            cos($patientlat * $p) * cos($qlat * $p) * 
                            (1 -cos(($qlong - $patientlong) * $p))/2;
                        $distance = 12742 * asin(sqrt($a));
                    }

                    if($quarantine=="Hospital Sungai Buloh"){
                        $qlat=3.2196;
                        $qlong=101.5831;
                        $minlat = 3.21420043;
                        $minlong = 101.57770043;
                        $maxlat = 3.22499957;
                        $maxlong = 101.58849957;
                        //radius=0.00539957
                        //radius 20m = 0.01079913

                        $p = 0.017453292519943295;
                            // $c = cos;
                            $a = 0.5 - cos(($qlat - $patientlat) * $p)/2 + 
                            cos($patientlat * $p) * cos($qlat * $p) * 
                            (1 -cos(($qlong - $patientlong) * $p))/2;
                        $distance = 12742 * asin(sqrt($a));
                    }

                    if($quarantine=="Home"){
                        $qlat=$patientlat;
                        $qlong=$patientlong;
                        $minlat = $qlat-0.01079913;
                        $minlong = $qlong-0.01079913;
                        $maxlat = $qlat+0.01079913;
                        $maxlong = $qlong-0.01079913;

                        $p = 0.017453292519943295;
                            // $c = cos;
                            $a = 0.5 - cos(($qlat - $patientlat) * $p)/2 + 
                            cos($patientlat * $p) * cos($qlat * $p) * 
                            (1 -cos(($qlong - $patientlong) * $p))/2;
                        $distance = 12742 * asin(sqrt($a));
                    }

                    if($distance>0.0050){
                        $status = "Out";
                    }
                    else{
                        $status = "In";
                    }
                    
                    echo $status; 
                    ?>
                    <script>
                        window.setInterval('refresh()', 5000);
                        // Call a function every 5000 milliseconds 
                        // (OR 10 seconds).
                    
                        // Refresh or reload page.
                        function refresh() {
                            window .location.reload();
                        }
                    </script>
                    </td>
                    <td class="text-center">{{$list->data()['quarantineDuration']}}</td>
                    
                </tr>
                
            @endforeach
            
        </table>
        
    </div>
</div>
</body>
</html>
@endsection

