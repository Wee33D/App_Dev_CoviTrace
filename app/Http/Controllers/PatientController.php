<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Auth;
use Kreait\Firebase\Exception\FirebaseException;
use Session;

class PatientController extends Controller
{

public function displayinfo(){
        $patient = app('firebase.firestore')->database()->collection('patients')->documents();
         

      return view('patients')->with(compact('patient'));

   }

public function view($id)
{
    
    $patient = app('firebase.firestore')->database()->collection('patients')->document($id)->snapshot();

  return view('patientDetail', compact('patient','id'));
}


public function update(Request $request,$id)
{
  $ql=$request->quarantineLocation;
    if($ql=="MAEPS"){
      $latitude=2.9794;
      $longitude=101.6977;
    }
    if($ql=="Hosp Sungai Buloh"){
      $latitude=3.2203;
      $longitude=101.5829;
    }

    $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
     $json = @file_get_contents($url);
     $data=json_decode($json);
     $status = $data->status;
     if($status=="OK")
     {
       return $data->results[0]->formatted_address;
     }
     else
     {
       return false;
     }

      $lat= 26.754347; //latitude
      $lng= 81.001640; //longitude
      $address= getaddress($lat,$lng);
      if($address)
      {
        echo $address;
      }
      else
      {
        echo "Not found";
      }
  
  $patient = app('firebase.firestore')->database()->collection('patients')->document($id)->update([
    ['path'=> 'address','value'=>$request->address],
    ['path'=> 'Quarantine Location','value'=>$request->quarantineLocation ],
    ['path'=> 'quarantineDuration','value'=>$request->quarantineDuration],
    ['path'=> 'qlLatitude','value'=>$latitude],
    ['path'=> 'qlLongitude','value'=>$longitude],
    ['path'=> 'startD','value'=>$request->startD],
    ['path'=> 'endD','value'=>$request->endD],
  ]);
      if($patient){
        return back()->with('message','Update Successfully');
      }else{
        return back()->with('message','Update fail');
      }

    
}

public function destroy($id)
{
  
   app('firebase.firestore')->database()->collection('patients')->document($id)->delete();
   
  return back()->with('messageD','Delete successfully');
  
}

public function trackpatients(){

  $patient = app('firebase.firestore')->database()->collection('patients')->documents(); 

return view('trackpatients')->with(compact('patient'));
}


}
