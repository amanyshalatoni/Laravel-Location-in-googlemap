<?php

namespace App\Http\Controllers\Municipality;

use Illuminate\Http\Request;
use App\municipality;
class HomeController extends BaseController
{
    
    public function profile(){
        $item=municipality::find($this->municipalityId);
        return view("municipality.home.profile",compact("item"));
    }
    function guidv4()
    {
        if (function_exists('com_create_guid') === true)
            return trim(com_create_guid(), '{}');

        $data = openssl_random_pseudo_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
    public function updateprofile(Request $request)
    {       
        $item = municipality::find($this->companyId);        
        $item->name= $request["name"];
        $item->details= $request["details"];        
        $item->email= $request["email"];
        $item->mobile= $request["mobile"];
        $item->address= $request["address"];
        
        $logo = $request->file('img');
        if($logo!=NULL){
            $type = $logo->getMimeType();
            if(!strstr($type,"image")){
                \Session::flash("msg","e:الرجاء اختر صورة صحيحة");
                return redirect("/municipality/home/profile");
            }
            else{
                $img=$this->guidv4().".".$logo->getClientOriginalExtension();
                $item->logo=$img;
                $logo->move("data/images/",$img);

            }
        }
        
        $item->save();
        
        \Session::flash("msg","s:municipality updated successfully");
        return redirect("/municipality/home/profile");
    }
    public function changepassword(){
        return view("municipality.home.changepassword");
    }
}