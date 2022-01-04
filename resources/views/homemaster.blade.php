@extends('layouts.app2')

@section('content') 

<!DOCTYPE html>
<html lang="en" class="page">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard</title>
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">   

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-green.css">
</head>

<div class='integrate-container'>
    <div class='dash'>
    <a href="{{ url('register1') }}" button class="button"><span>Manage Healthcare Admin </span></a></button> 
    </div>
</div>

<div class="w3-row-padding w3-padding-32" style="margin:0 -16px">
        <div class="w3-third w3-margin-bottom">
        <img src="{{ URL::to('/img/stats.jpg') }}" height="300px" width="450px" id="divOne" />
          <div class="w3-container w3-white">
            <hr><p><b>NEWS 1</b></p>
            <p class="w3-opacity">Fri 13 Nov 2021</p>
            <p>The official Malaysia government website for data and insights on COVID-19.</p>
            <button class="w3-button w3-black w3-margin-bottom" onclick="window.location.href='https://covidnow.moh.gov.my/'"style.display='block'">LEARN MORE</button>
          </div>
        </div>

        <div class="w3-third w3-margin-bottom">
        <img src="{{ URL::to('/img/kobid1.jpg') }}" height="300px" width="450px" id="divTwo" />
          <div class="w3-container w3-white">
            <hr><p><b>NEWS 2</b></p>
            <p class="w3-opacity">Sat 20 Nov 2021</p>
            <p>The COVID-19 Prevention Guidelines.</p>
            <button class="w3-button w3-black w3-margin-bottom" onclick="window.location.href='https://malaysia.cochrane.org/bahasa-malaysia/coronavirus-covid-19-langkah-kawalan-dan-pencegahan-jangkitan'" style.display='block'">LEARN MORE</button>
          </div>
        </div>

        <div class="w3-third w3-margin-bottom">
        <img src="{{ URL::to('/img/vaksin.jpg') }}" height="300px" width="450px" id="divThree" />
          <div class="w3-container w3-white">
            <hr><p><b>NEWS 3</b></p> 
            <p class="w3-opacity">Sat 27 Nov 2021</p>
            <p>The National Vaccination Programme.</p>
            <button class="w3-button w3-black w3-margin-bottom" onclick="window.location.href='https://www.vaksincovid.gov.my/en/'"style.display='block'">LEARN MORE</button>
          </div>
        </div>
</div>

</body>
</html>
@endsection

