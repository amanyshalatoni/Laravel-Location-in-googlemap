<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

use App\Http\Requests\ClientRequest;
use App\Client;
use App\Http\Requests\ChangePasswordRequest;
use Session;
use Illuminate\Support\Facades\Hash;
class HomeController extends BaseController
{
    public function index(){
        return view("client.home.index");
    }
    
    
    public function profile(){
        $item=client::find($this->ClientId);
        return view("client.home.profile",compact("item"));
    }
    
    public function updateprofile(Request $request)
    {       
        
        $item = client::find($this->ClientId);        
        $item->name= $request["name"];
        $item->mobile= $request["mobile"];
        $item->gender= $request["gender"];
        $item->dob= $request["dob"];

        $item->save();
        
        \Session::flash("msg","s:Client updated successfully");
        return redirect("/client/home/profile");
    }
    public function changepassword(){
        return view("client.home.changepassword");
    }
    
}