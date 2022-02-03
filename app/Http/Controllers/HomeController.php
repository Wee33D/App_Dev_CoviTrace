<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Auth;
use Kreait\Firebase\Exception\FirebaseException;
use Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
      
      try {
     

              // $admin = ['aimanarriady20@gmail.com', 'meimeicovid@gmail.com'];
              
              // $user = app('firebase.auth')->getUsers($admin);

              $uid = Session::get('uid');
              $user = app('firebase.auth')->getUser($uid);
              // $pattern = 'covid@gmail\.com';

              if($uid == 'FqxeAW8pZ5UAeXLTIEawYFHLEda2'){
                return view('home2');
              }
              
              else{
                return view('home');
        }
        
       
  
      } catch (\Exception $e) {
        return $e;
      }

    }
        
  
    
}
