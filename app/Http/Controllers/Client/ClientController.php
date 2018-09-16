<?php

namespace App\Http\Controllers\Client;
use App\Client;
use App\Municipality;
use App\Plate;
use Illuminate\Http\Request;

class ClientController extends BaseController
{
    public function index(Request $request)
    {
      
        $items=plate::whereRaw("isdelete=0");
        
        return view("client.client.index");
    }
 
	
    public function show($id)
    {
        $item=client::find($id);
        if($item==NULL)
            return redirect("/admin/client");
        return view("admin.client.show",compact("item"));
    }
	
    public function destroy($id)
    {
        $item = client::find($id);
        if($item==NULL)
            return redirect("/admin/client");
        $item->isdelete=1;
        $item->updated_by=$this->adminId;       
        $item->save();
        
        \Session::flash("msg","w:تمت عملية الحذف بنجاح");
        return redirect("/admin/client");
    }
    

    public function active($id)
    {
        $item = client::find($id);
        if($item==NULL)
            return "Invalid ID";
        //$item->active=1-$item->active;
        $item->active=!$item->active;
        $item->updated_by=$this->adminId;       
        $item->save();
        
        return response()->json([
            'status' => 1,
            'msg' => 's:تمت عملية الحفظ بنجاح'
        ]);
    }
}