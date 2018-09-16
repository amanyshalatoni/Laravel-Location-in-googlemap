<?php

namespace App\Http\Controllers\Municipality;

use Illuminate\Http\Request;
use App\Http\Requests\municipalityRequest;
use App\Municipality;
use App\Price_licenses;
use App\Plate;
use App\Client;
use App\platetype;

class municipalityController extends BaseController
{
    public function index(Request $request)
    {
      // $sum=0; 
      $q = $request["q"];
      $active = $request["active"];
      $typeplate = $request["typeplate"];
      $pricel = $request["pricel"];
        
      $plates= plate::whereRaw("plate.isdelete=0 and municipality_id = ?",["$this->municipalityId"] );   
      //$client= client::whereRaw("client.isdelete=0 and municipality_id = ?",["$this->municipalityId"] );  
        
      if ($q!=NULL)
          $plates=$plates->whereRaw("(plate.id like ? )",["%$q%"]);
      if($active!=NULL)
          $plates=$plates->whereRaw("job.active = ?",[$active]);
      if($typeplate!=NULL)
          $plates=$plates->whereRaw("plate_type_id = ?",[$typeplate]);
      if($pricel!=NULL)
          $plates=$plates->whereRaw("plate.price_licenses_id = ?",[$pricel]);
        
      $plates=$plates->paginate(5)->appends(["q"=>$q , "active"=>$active]);
        
        $price=price_licenses::all();
       // $platetype=plate_type::all();

      return view("municipality.municipality.index"
                  ,compact("price","q","active","typeplate","pricel"));
     }
    

  public function create()
    {
        $platetype=plate_type::all();
        return view("municipality.municipality.create",compact("platetype"));
    }

    public function store(PlateRequest $request)
    {        
        $plates = new Plate();
        
        $plates->street= $request["street"];
        $plates->municipalityId=$this->municipalityId;
        $plates->photo= $request["photo"];
        $plates->plate_type_id= $request["plate_type_id"];
        $plates->from_date= $request["from_date"];
        $plates->to_date= $request["to_date"];
        $plates->active=0;
        $plates->updated_by=$this->municipalityId;
        $plates->isdelete=0;
        
        $plates->save();
        
        \Session::flash("msg","i:تمت اضافة اللوحة بنجاح");
        return redirect("/municipality/plate/create");
    }
    public function show($id)
    {
        $j =plate::find($id);
        if($j==NULL)
            return redirect("/municipality/plate");
        if($j->municipality_id!=$this->municipalityId)
             return redirect("/municipality/plate");
        return view("municipality.municipality.show",compact("j"));
    }
    public function edit($id)
    {        
        $item =Job::find($id);
        if($item==NULL)
            return redirect("/company/job");
        if($item->company_id!=$this->companyId)
             return redirect("/company/job");
        
        if($item->active){
            \Session::flash("msg","e:لا يمكن التعديل على وظيفة معتمدة من الادارة");
            return redirect("/company/job");
        }
        $jobtypes=JobType::get();
        $jobcategories=Category::get();
        return view("company.job.edit",compact("item","jobcategories","jobtypes"));
    }
    public function update(JobRequest $request, $id)
    {                  
        $job = Job::find($id);
        
        if($job==NULL)
            return redirect("/company/job");
        if($job->company_id!=$this->companyId)
             return redirect("/company/job");
        
        $job->title= $request["title"];        
        $job->details= $request["details"];
        $job->category_id= $request["category_id"];
        $job->job_type_id= $request["job_type_id"];
        $job->from_date= $request["from_date"];
        $job->to_date= $request["to_date"];
        $job->updated_by=$this->companyId;
        $job->isdelete=0;
        
        $job->save();
        
        \Session::flash("msg","s:Job updated successfully");
        return redirect("/company/job");
    }
    public function destroy($id)
    {
        $plates = municipality::find($id);
        if($plates==NULL)
            return redirect("/municipality/plate");
        if($plates->municipality_id!=$this->municipalityId)
             return redirect("/municipality/plate");
        $plates->isdelete=1; 
        
        $plates->save();
        \Session::flash("msg","w:تم حذف اللوحة بنجاح");
        return redirect("/municipality/plate");
    }
}