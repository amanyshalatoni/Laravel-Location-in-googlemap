<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\plate;

class plateController extends BaseController
{
    public function index(Request $request)
    {
        $q=$request["q"];
        $active=$request["active"];
        
        
        $items=plate::whereRaw("isdelete=0");
        if($q!=NULL)
            $items=$items->whereRaw("(name like ?)",["%$q%"]);
        if($active!=NULL)
            $items=$items->whereRaw("active = ?",[$active]);
        
        $items=$items->paginate(7)->appends(["q"=>$q,"active"=>$active]);
        return view("admin.plate.index",compact("items","q","active"));
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
