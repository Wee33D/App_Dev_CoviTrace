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

class PdfController extends Controller
{
    public function store_letter(Request $request,$id){
        
        $letter = app('firebase.firestore')->database()->collection('patients')->document($id)->update([
            ['path'=> 'letter','value'=> $request->letter],
          ]);
      
      $data["email"] = $request->email;
      $data["title"] = "Quarantine Letter";
      $data["name"] = $request->name;
      $data["endD"] = $request->endD;
      $data["body"]=  $request->letter;
 
        $pdf = PDF::loadview('pdf.letterpdf', $data );

        Mail::send('pdf.letterpdf', $data, function($message)use ($data, $pdf){
            $message->to($data['email'])
                    ->subject($data["title"])
                    ->attachData($pdf->output(),"notice");
        });

        return back()->with('message','Generate Successfully');

        
      } 

      public function viewLetter($id){
    
            $pdf = app('firebase.firestore')->database()->collection('patients')->document($id)->snapshot();

        return view('pdf\NoticeLetter', compact('pdf','id'));
        }


}
