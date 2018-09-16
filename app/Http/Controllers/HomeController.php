<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\User;
use App\Http\Requests\ClientRequest;

use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __construct()
    {
    //    $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }
        public function redirect(){
        $user = \Auth::user();
        if($user!=NULL){
            $isAdmin=\DB::table("admin")->where("user_id",$user->id)->count();
            $isClient=\DB::table("client")->where("user_id",$user->id)->count();
            if($isAdmin)
                return redirect("/admin/adminajax");
            else if($isClient)
                return redirect("/client");
        }
        return redirect("/home");
    }
    public function register()
    {
        return view("home.register");
    }

    public function postregister(ClientRequest $request)
    {
              $newclient= User::create([
               'name' => $request['name'],
           'email' => $request['email'],
       'password' => Hash::make($request['password']),
	  ]);

		  $IsExists=client::whereRaw("isdelete=0 and email=?",$request["email"])->count();
		  if($IsExists>0){
    			\Session::flash("msg","e:".$request["name"]." موجود مسبقا لدينا ");
    			return redirect("/home/register");
    		  }
        
		  $client = new Client ();
		  $client->active = 1;
		  $client->name = $request["name"];
		  $client->email = $request["email"];
		  $client->mobile = $request["mobile"];
		  $client->mobile = $request["gender"];
		  $client->isdelete=0;
		  $client->save();
        
    }

}
