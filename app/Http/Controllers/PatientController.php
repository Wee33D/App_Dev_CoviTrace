<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Auth;
use Kreait\Firebase\Exception\FirebaseException;
use Session;
use PDF;
use Mail;
use DateTime;


class PatientController extends Controller
{

public function search(Request $request){

  $search = $request->input('search');
  $patient = app('firebase.firestore')->database()->collection('patients')
          ->orderBy('quarantineDuration','asc')
          ->startAt([$search])
          ->endAt([$search."\uf8ff"]);

          return view('patients')->with(compact('patient'));
}

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
  $quarantine = $request->quarantineLocation;
  
  if($quarantine=="MAEPS"){
    $qlat=2.9794;
    $qlong=101.6977;
    $minlat = 2.9794-0.00539957;
    $minlong = 101.6977-0.00539957;
    $maxlat = 2.9794+0.00539957;
    $maxlong = 101.6977+0.00539957;
  }

  if($quarantine=="Hospital Sungai Buloh"){
    $qlat=3.2196;
    $qlong=101.5831;
    // $minlat = 3.2196-0.00539957;
    $minlat = 3.21420043;
    $minlong = 101.57770043;
    // $minlong = 101.5831-0.00539957;
    // $maxlat = 3.2196+0.00539957;
    $maxlat = 3.22499957;
    $maxlong = 101.58849957;
    // $maxlong = 101.5831+0.00539957;
  }

  $patientc = app('firebase.firestore')->database()->collection('patients')->document($id)->snapshot()->data();
  $patientlat = $patientc['latitude'];
  $patientlong = $patientc['longitude'];

  //compare
  //
  if($patientlat<$minlat||$patientlat>$maxlat){
    $status = "Out";
  }
  else if($patientlong<$minlong||$patientlong>$maxlong){
    $status = "Out";
  }
  else{
    $status = "In";
  }

  $patient = app('firebase.firestore')->database()->collection('patients')->document($id)->update([

    ['path'=> 'Quarantine Location','value'=>$request->quarantineLocation],
    ['path'=> 'qlatitude','value'=>$qlat],
    ['path'=> 'qlongitude','value'=>$qlong],
    ['path'=> 'radius','value'=>0.00539957],
    ['path'=> 'status','value'=>$status],
    
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
