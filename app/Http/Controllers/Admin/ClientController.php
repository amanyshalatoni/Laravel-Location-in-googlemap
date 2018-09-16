<?php

namespace App\Http\Controllers\Admin;
use App\Client;
use Illuminate\Http\Request;
use App\Plate;

class ClientController extends BaseController
{
    public function index(Request $request)
    {
        $q=$request["q"];
        $active=$request["active"];
        $gender=$request["gender"];
        
        $items=client::whereRaw("isdelete=0");
		
		 if($gender!=NULL)
            $items=$items->whereRaw("gender = ?",[$gender]);
        if($q!=NULL)
            $items=$items->whereRaw("(name like ? or email like ? or mobile like ?)",["%$q%","%$q%","%$q%"]);
        if($active!=NULL)
            $items=$items->whereRaw("active = ?",[$active]);
        
        $items=$items->paginate(7)->appends(["q"=>$q,"active"=>$active,"gender"=>$gender]);
        return view("admin.client.index",compact("items","q","active","gender"));
    }
	
        public function Platebook(Request $request, $id)
    {
            
        $items=client::find($id);
      $q = $request["q"];        
      //$jss =plate_client::leftJoin("plate","plate_id","plate.id")->whereRaw(" plate_id = ?",["$id"] );      
    
      //if ($q!=NULL)
        //  $jss=$jss->where("plate.type","like","%$q%");
          //$jss=$jss->whereRaw("(name like ? or email like ?  or mobile like ?)",["%$q%","%$q%","%$q%"]);
      
    //  $jss=$jss->paginate(5)->appends(["q"=>$q]);
      return view("admin.client.Platebook"
                  ,compact("q","items"));
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