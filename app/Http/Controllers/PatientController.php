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

public function edit($id)
{
    
    $patient = app('firebase.firestore')->database()->collection('patients')->document($id)->snapshot();

  return view('updatepatient', compact('patient','id'));
}

public function view($id)
{
    
    $patient = app('firebase.firestore')->database()->collection('patients')->document($id)->snapshot();

  return view('updatepatient', compact('patient','id'));
}


public function update(Request $request,$id)
{
  
  $patient = app('firebase.firestore')->database()->collection('patients')->document($id)->update([
    ['path'=> 'name','value'=>$request->name],
    
  ]);
 if($patient){
      return back()->with('status','Update Succesfully');
 }else{
      return back()->with('status','Update Fail');
 }
 
}

public function destroy($id)
{
  //
  app('firebase.firestore')->database()->collection('patients')->document($id)->delete();
  return back();
}

// public function store(Request $request)
// {
//   if ($request->doc_id == null) {
//     // Uplode Data
//     $request->validate([
//       'name' => 'required',
//       'email' => 'required',
//       'ic' => 'required',
//      ]);
//     $patient = app('firebase.firestore')->database()->collection('patients')->newDocument();
//     $patient->set([
//       'name' => $request->first_name,
//       'email' => $request->last_name,
//       'ic'    => Hash::make($request->age),
//     ]);
//     Session::flash('message', 'Information Uploaded');
//     return back()->withInput();
//   }
//   else {

//     $student = app('firebase.firestore')->database()->collection('User')->document($request->doc_id)->snapshot();

//     $name = $student->data()['firstname'];
//     $lname = $student->data()['lastname'];
//     $age = $student->data()['age'];

//     $data = sprintf("Name : %s %s \n and Age : %s", $name, $lname, $age);

//     Session::flash('message',  $data);
//     return back()->withInput();

//   }


// }



}
