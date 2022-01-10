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
  }

  if($quarantine=="Hospital Sungai Buloh"){
    $qlat=3.2196;
    $qlong=101.5831;
  }

  $patient = app('firebase.firestore')->database()->collection('patients')->document($id)->update([
    ['path'=> 'quarantineDuration','value'=>$request->quarantineDuration],
    ['path'=> 'Quarantine Location','value'=>$request->quarantineLocation],
    ['path'=> 'qlatitude','value'=>$qlat],
    ['path'=> 'qlongitude','value'=>$qlong],
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
