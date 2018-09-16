@extends("municipality._layout")

@section("title")
اضافة لوحة جديدة
@endsection



@section("content")
<form action="/municipality/plate" class="form-horizontal" method="post">
    {{csrf_field()}}
          <div class="form-group">
            <label for="id" class="col-sm-2 control-label">اللوحة</label>
            <div class="col-sm-10">
              <input autofocus type="text" value="{{old("id")}}" class="form-control" name="id" placeholder="اللوحة">
            </div>
          </div>
    
    <div class="form-group">
            <label for="client_id" class="col-sm-2 control-label">العميل</label>
            <div class="col-sm-10">
              <label class="form-control" rows="5" name="client_id" placeholder="العميل">{{old("client_id")}}</label>
            </div>
          </div>
          
         
    
       <div class="form-group">
            <label for="details_address" class="col-sm-2 control-label">مكان اللوحة</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="5" name="details_address" placeholder="تفاصيل العنوان">{{old("details_address")}}</textarea>
            </div>
          </div>
    
     <div class="form-group">
            <label for="plate_type_id" class="col-sm-2 control-label">نوع اللوحة</label>
            <div class="col-sm-10">
                
                <select class="form-control" name="category_id" id="plate_type_id">
                    <option value="">اختر النوع</option>
                    @foreach($platetype as $c)
                    <option {{old("plate_type_id")==$c->id?"selected":""}} value="{{$c->id}}">{{$c->type}}</option>
                    @endforeach
                </select>
         </div>   
    </div>
    
        
    
    <div class="form-group">
            <label for="from_date" class="col-sm-2 control-label">من تاريخ</label>
            <div class="col-sm-10">
              <input  type="text" value="{{old("from_date")}}" class="form-control" name="from_date" placeholder="من تاريخ">
            </div>
          </div>
    
          
            <div class="form-group">
            <label for="to_date" class="col-sm-2 control-label">الى تاريخ</label>
            <div class="col-sm-10">
              <input  type="text" value="{{old("to_date")}}" class="form-control" name="to_date" placeholder="الى تاريخ">
            </div>
          </div>
    
              
          
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">احفظ</button>
                <a class="btn btn-default" href="/municipality/plate">الغاء الأمر</a>
            </div>
          </div>
        </form>
@endsection