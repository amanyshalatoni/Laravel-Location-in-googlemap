<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Requests\PlateRequest;
use App\Plate;
use App\platetype;
use App\Municipality;
use App\Client;
use App\location;
use DB;
class PlateController extends BaseController
{
    public function index(Request $request)
    {
        $locations = DB::table('location')->whereRaw("active=1")->get();
        $items=plate::whereRaw("isdelete=0");
        return view("client.plate.index",compact('locations'));
    }
    public function confirm(Request $request ,$id)
    {
     $platetypes=platetype::all();
        $municipalitychoice=Municipality::all();
        
          $locations = location::find($id);
         if($locations==NULL)
            return redirect("/client/plate");
         $item=plate::find($this->ClientId);
        return view("client.plate.confirm",compact("item","locations","platetypes","municipalitychoice"));
    }
   public function book($id)
    {
       
         $item=client::find($this->ClientId);
        return view("client.plate.book",compact("item"));
    }
        public function updatebook(Request $request)
    {       
        
        $item = client::find($this->ClientId);        
        $item->name= $request["name"];
        $item->mobile= $request["mobile"];
        $item->save();
        
        \Session::flash("msg","s:Client updated successfully");
        return redirect("/client/home/profile");
    }
  
    public function create()
    {
        return view("admin.plate.create");
    }

    public function store(plateRequest $request)
    {        
       
        $IsExists=plate::whereRaw("isdelete=0 and name=?",$request["name"])->count();
        if($IsExists>0){
            \Session::flash("msg","e:".$request["name"]." موجود مسبقا لدينا ");
            return redirect("/admin/plate/create")->withInput();  
        }
        $item = new plate();
        
        $item->name= $request["name"];
        $item->active= $request["active"]?1:0;
        $item->created_by=$this->adminId;
        $item->isdelete=0;
        $item->save();
        
        \Session::flash("msg","i:تمت عملية الاضافة بنجاح");
        return redirect("/admin/plate/create");
    }

    public function edit($id)
    {
        $item=plate::find($id);
        if($item==NULL)
            return redirect("/admin/plate");
        return view("admin.plate.edit",compact("item"));
    }
    public function update(plateRequest $request, $id)
    {   
        $IsExists=plate::whereRaw("isdelete=0 and id!=$id and name=?",$request["name"])->count();
        if($IsExists>0){
            \Session::flash("msg","e:".$request["name"]." موجود مسبقا لدينا ");
            return redirect("/admin/plate/$id/edit");  
        }
        $item = plate::find($id);
        
        $item->name= $request["name"];
        $item->active= $request["active"]?1:0;
        $item->updated_by=$this->adminId;
       
        $item->save();
        
        \Session::flash("msg","s:تمت عملية الحفظ بنجاح");
        return redirect("/admin/plate");
    }
    public function destroy($id)
    {
        $item = plate::find($id);
        if($item==NULL)
            return redirect("/admin/plate");
        $item->isdelete=1;
        $item->updated_by=$this->adminId;       
        $item->save();
        
        \Session::flash("msg","w:تمت عملية الحذف بنجاح");
        return redirect("/admin/plate");
    }
           
   
    public function active($id)
    {
        $item = plate::find($id);
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
