<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Municipality;
class municipalityController extends BaseController
{
    public function index(Request $request)
    {
        $q=$request["q"];
        $active=$request["active"];
        
        
        $items=municipality::whereRaw("isdelete=0");
        if($q!=NULL)
            $items=$items->whereRaw("(name like ? or email like ? or mobile like ?)",["%$q%","%$q%","%$q%"]);
        if($active!=NULL)
            $items=$items->whereRaw("active = ?",[$active]);
        
        $items=$items->paginate(7)->appends(["q"=>$q,"active"=>$active]);
        return view("admin.municipality.index",compact("items","q","active"));
    }	
	
    public function show($id)
    {
        $item=municipality::find($id);
        if($item==NULL)
            return redirect("/admin/municipality");
        return view("admin.municipality.show",compact("item"));
    }
	
	
    public function destroy($id)
    {
        $item = municipality::find($id);
        if($item==NULL)
            return redirect("/admin/municipality");
        $item->isdelete=1;
        $item->updated_by=$this->adminId;       
        $item->save();
        
        \Session::flash("msg","w:تمت عملية الحذف بنجاح");
        return redirect("/admin/municipality");
    }
    
    public function active($id)
    {
        $item = municipality::find($id);
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