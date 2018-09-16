@extends("admin._layout")

@section("title")
اللوحات
@endsection



@section("content")
<form class="row">
    <div class="col-sm-4">
      <input value="{{$q}}" type="text" autofocus name="q" placeholder="كلمة البحث" class="form-control" />
    </div>
    <div class="col-sm-2">
        <select class="form-control" name="active">
            <option value="">جميع الحالات</option>
            <option {{$active=="1"?"selected":""}} value="1">فعال</option>
            <option {{$active=="0"?"selected":""}} value="0">غير فعال</option>
        </select>
    </div>
    
    <div class="col-sm-2">
      <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i> بحث</button>
    </div>
</form> 

@if($items->count()>0)
<table class="table table-striped table-hover">
    <thead>
        <tr><th>رقم اللوحة</th><th width="15%">اللوحة</th><th>البلدية المرخصة</th><th>مرخصة بسعر</th><th>نوع اللوحة</th><th> الشارع</th><th >فعالة؟</th><th width="10%">تاريخ الانشاء</th><th >سعر تمديدها</th><th width="15%" > </th>
            
        </tr>
    </thead>
    <tbody>
         @foreach($items as $i)
           @if($i->to_date>now())   
       
        <tr>
            <td>{{$i->id}}</td>
            <td><img width="100" src="/data/images/{{$i->logo}}" /></td>
            <td>{{$i->municipalitys->name}}</td>
            <td>{{$i->municipalitys->price_meter}}</td>
            <td>{{$i->type}}</td>
            <td>{{$i->street}}</td>
            <td><input class="cbActive" value="{{$i->id}}" type="checkbox" 
                       {{$i->active?"checked":""}} /></td>
            <td>{{$i->created_at}}</td>
            <td>{{$i->price_electric}}</td>
            <td>
				 <a href="/admin/plate/{{$i->id}}" class="btn btn-info btn-xs">
                    <i class="glyphicon glyphicon-info-sign"></i>
                </a>
                     <a href="/admin/plate/{{$i->id}}/edit" class="btn btn-primary btn-xs">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="/admin/plate/{{$i->id}}/delete" class="Confirm btn btn-danger btn-xs">
                        <i class="fa fa-trash"></i>
                    </a>
            </td>
        </tr>
          @endif
                    @endforeach
        
        
        </tbody>
</table>
{{$items->links()}}
@else
<br><br>
<div class="alert alert-warning">لا يوجد بيانات لعرضها </div>
@endif
@endsection

@section("js")
<script>
    $(function(){
        $(".cbActive").click(function(){
            var id=$(this).val();
            $.get("/admin/plate/active/"+id,function(json){
                ShowMessage(json.msg,"ادارة اللوحات");
            },"json");
        });
    });
</script>
@endsection


