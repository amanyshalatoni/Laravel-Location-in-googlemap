@extends("admin._layout")

@section("title")
تعديل اللوحة
@endsection



@section("content")
<form action="/admin/admin/{{$item->id}}" class="form-horizontal" method="post">
    {{csrf_field()}}
     <input type="hidden" name="_method" value="put"/>
          <div class="form-group">
            <label for="title" class="col-sm-2 control-label">نوع اللوحة</label>
            <div class="col-sm-10">
              <input autofocus type="text" value="{{$item->title}}" class="form-control" name="title" placeholder="عنوان الوظيفة">
            </div>
          </div>
    
    <div class="form-group">
            <label for="details" class="col-sm-2 control-label">صورة اللوحة</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" name="details" placeholder="تفاصيل الوظيفة">{{$item->details}}</textarea>
            </div>
          </div>
          
           <div class="form-group">
            <label for="details" class="col-sm-2 control-label">الشارع </label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" name="details" placeholder="تفاصيل الوظيفة">{{$item->details}}</textarea>
            </div>
          </div>
    
     <div class="form-group">
            <label for="category_id" class="col-sm-2 control-label">البلدية</label>
            <div class="col-sm-10">
                
                <select class="form-control" name="category_id" id="category_id">
                    <option value="">اختر البلدية</option>
                    @foreach($jobcategories as $c)
                    <option {{$item->category_id==$c->id?"selected":""}} value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
         </div>   
    </div>
    <div class="form-group">
            <label for="job_type_id" class="col-sm-2 control-label">نوع الدوام</label>
            <div class="col-sm-10">
                <select class="form-control" name="job_type_id" id="job_type_id">
                <option value="">نوع الدوام</option>
                    @foreach($jobtypes as $j)
                    <option {{$item->job_type_id==$j->id?"selected":""}} value="{{$j->id}}">{{$j->name}}</option>
                    @endforeach
                </select>
                </div>
                </div>
    
           <div class="form-group">
            <label for="from_date" class="col-sm-2 control-label">من تاريخ</label>
            <div class="col-sm-10">
              <input  type="text" value="{{$item->from_date}}" class="form-control" name="from_date" placeholder="من تاريخ">
            </div>
          </div>
    
    <div class="form-group">
            <label for="to_date" class="col-sm-2 control-label">الى تاريخ</label>
            <div class="col-sm-10">
              <input  type="text" value="{{$item->to_date}}" class="form-control" name="to_date" placeholder="الى تاريخ">
            </div>
          </div>
          
            <div class="form-group">
            <label for="from_date" class="col-sm-2 control-label">سعر التمديد الكهربائي</label>
            <div class="col-sm-10">
              <input  type="text" value="{{$item->from_date}}" class="form-control" name="from_date" placeholder="من تاريخ">
            </div>
          </div>
          
            <div class="form-group">
            <label for="from_date" class="col-sm-2 control-label">سعر الترخيص</label>
            <div class="col-sm-10">
              <input  type="text" value="{{$item->from_date}}" class="form-control" name="from_date" placeholder="من تاريخ">
            </div>
          </div>
          
          
    
          
              
          
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">احفظ</button>
                <a class="btn btn-default" href="/admin/plate">الغاء الأمر</a>
            </div>
          </div>
        </form>


@endsection



