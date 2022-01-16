<?php

// namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Kreait\Firebase\Auth as FirebaseAuth;
use Kreait\Firebase\Exception\FirebaseException;
use Illuminate\Validation\ValidationException;


class HealthAdminController extends Controller
{
    function register1(){
        return view('register1');
    }

    function save1(Request $request){
      // $validator = Validator::make(request->all(),[
      //   'first_name' => 'required|unique:posts|max:255',
      //   'last_name' =>'required|unique:posts|max:255',
      //   'email' => 'required|email'

      // ]);

      $stuRef = app('firebase.firestore')->database()->collection('Healthcare Authority')->newDocument(); 
      $stuRef->set([    
        'first_name' =>$request->first_name,
        'last_name' =>$request->last_name, 
        'email'    =>$request->email
    ]); 
    
      try{
      $password = 'admin1234';
      $level = 2;
      
      $authRef = app('firebase.auth')->createUser([
      'email'    =>$request->email,
      'password' => $password,
      'level' => $level
      ]);

    $email = $request->email;
    app('firebase.auth')->sendEmailVerificationLink($email);   

  return back()->with('success','Admin was added successfuly');
   
}   
catch (\Kreait\Firebase\Exception\Auth\EmailExists $ex) {  
  echo 'email already exists';  
}  
}

  
     public function index()
     {
  
       try {
         $uid = Session::get('uid');
         $user = app('firebase.auth')->getUser($uid);
         return view('home');
       } catch (\Exception $e) {
         return $e;
       }
 
     }

     public function displayAdmininfo(){

        $admin = app('firebase.firestore')->database()->collection('Healthcare Authority')->documents(); 
        return view('auth.register1')->with(compact('admin'));
   }

   public function view($id){
     $admin = app('firebase.firestore')->database()->collection('Healthcare Authority')->document($id)->snapshot();
     return view('AdminDetail', compact('admin','id'));
    }

    public function update(Request $request,$id){
      $admin = app('firebase.firestore')->database()->collection('Healthcare Authority')->document($id)->update([
    ['path'=> 'first_name','value'=>$request->first_name],
    ['path'=> 'last_name','value'=>$request->last_name],
  ]);
      return back()->with('success','Admin was updated successfuly');
      
}

   public function destroy($id){
     app('firebase.firestore')->database()->collection('Healthcare Authority')->document($id)->delete();
     return back();
}

}

