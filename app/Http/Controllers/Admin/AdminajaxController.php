<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use App\User;

class AdminajaxController extends BaseController
{
    	public function AjaxDT(Request $request)
    {
		$order_by_index=$request->input("order")[0]["column"];
		$order_by_direction=$request->input("order")[0]["dir"];		
		$columns=array("name","email","mobile","active","created_at");
        
        $q=$request->input("q"); 
        $active=$request->input("active");       
        $qs="%".str_replace(" ","%",$q)."%";      
		
        $items = Admin::whereRaw("isdelete=0 and (admin.name like ?)",[$qs]);
        if($active!=NULL)
            $items=$items->whereRaw("active=?",[$active]);
        
		$Length=$request->input("length");
		$Start=$request->input("start");
		$Draw=$request->input("Draw");
		$totalCount = $items->count();
		
        $items=$items
		->orderby($columns[$order_by_index],$order_by_direction)->take($Length)->skip($Start)->get();
         
		 
		return response()
            ->json(['draw' => $Draw,"recordsTotal"=>$totalCount,
			"recordsFiltered"=>$totalCount,
			"data"=>$items]);
    }
    
    public function index()
    {
        return view("admin.adminajax.index");
    }

    public function create()
    {
        return view("admin.adminajax.create");
    }

    public function store(AdminRequest $request)
    {      
        if($request["password"]=="" || strlen($request["password"])<6){
              return response()->json([
            'status' => 1,
            'msg' => "e:يجب ادخال كلمة المرور6 أحرف"
        ]);
        }
        $IsExists=User::whereRaw("email=?",$request["email"])->count();
        if($IsExists>0){
              return response()->json([
            'status' => 0,
            'msg' => "e:".$request["name"]." موجود مسبقا لدينا "
        ]);
        }
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        
        $IsExists=Admin::whereRaw("isdelete=0 and email=?",$request["email"])->count();
        if($IsExists>0){
                  return response()->json([
            'status' => 0,
            'msg' => "e:".$request["name"]." موجود مسبقا لدينا "
        ]);
        }
        $item = new Admin();
        $item->user_id=$user->id;
        $item->name= $request["name"];
        $item->email= $request["email"];
        $item->mobile= $request["mobile"];
        $item->active= $request["active"]?1:0;
        $item->created_by=$this->adminId;
        $item->isdelete=0;
        $item->save();
        
             return response()->json([
            'status' => 1,
            'msg' => 's:تمت عملية الاضافة بنجاح'
        ]);
    }

    public function edit($id)
    {
        $item=Admin::find($id);
        if($item==NULL)
            return redirect("/adminajax");
        return view("admin.adminajax.edit",compact("item"));
    }
    public function update(AdminRequest $request, $id)
    {           
        $item = Admin::find($id);
        $user = User::find($item->user_id);
        $user->name = $request["name"];
        if($request["password"]!=""){
            $user->password=Hash::make($request['password']);
        }
        $user->save();
        $item->name= $request["name"];
        $item->mobile= $request["mobile"];        
        $item->active= $request["active"]?1:0;
        $item->updated_by=$this->adminId;
       
        $item->save();
          return response()->json([
            'status' => 1,
            'msg' => 's:تمت عملية الحفظ بنجاح'
        ]);
    }
    public function destroy($id)
    {
        $item = Admin::find($id);
        if($item==NULL)
            return redirect("/admin/adminajax");
        $item->isdelete=1;
        $item->updated_by=$this->adminId;       
        $item->save();
          return response()->json([
            'status' => 1,
            'msg' => 'w:تمت عملية الحذف بنجاح'
        ]);
    }
    
    public function active($id)
    {
        $item = Admin::find($id);
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
