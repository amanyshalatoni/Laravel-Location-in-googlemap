@extends("client._layout")

@section("title")
تاكيد لحجز اللوحة 
@endsection

@section("content")
<form action="/client/confirm" class="form-horizontal" method="post">
    {{csrf_field()}}
   
<dl class="dl-horizontal">
<dt> منطقة اللوحة</dt>
    <dd>{{$locations->region}}</dd>
    <dt> شارع اللوحة </dt>
    <dd>{{$locations->street}}</dd>
	<dt> العنوان بالتفصيل</dt>
    <dd>{{$locations->details_address}}</dd>
	<dt>اتجاه اللوحة</dt>
    <dd>{{$locations->direction}}</dd>
	<dt>ابعاد اللوحة</dt>
    <dd>{{$locations->Dimensions}}</dd>
</dl>	 
	 

	 
     
               <div class="form-group">
               <label for="logo" class="col-sm-2 control-label">اللوحة</label>
            <input class="uploud" type="file" name="cv" accept="image/*">
          </div>
     
              <div class="form-group">
               <label for="plate_type_id" class="col-sm-2 control-label">نوع الطباعة</label>
            <div class="col-sm-10">
             
              <select class="form-control" name="plate_type_id">
                <option value="">اختر  نوع الطباعة</option>
            @foreach($platetypes as $jt)
              <option value="{{old("type")}}" value="{{$jt->id}}">{{$jt->type}}</option>
                                                @endforeach
              </select>
            </div>  </div>
               

          <div class="form-group">
            <label for="plate_type_id" class="col-sm-2 control-label">طريقة التركيب</label>
            <div class="col-sm-10">
                <div class="radio">                
                <label><input {{$item->plate_type_id=="M"?"checked":""}} type="radio" id="plate_type_id" name="plate_type_id" value="1"/> ملصق</label>
                <label><input {{$item->plate_type_id=="F"?"checked":""}} type="radio" id="plate_type_id" name="plate_type_id" value="0"/> جلد</label>
                 <label><input {{$item->plate_type_id=="F"?"checked":""}} type="radio" id="plate_type_id" name="plate_type_id" value="0"/> شاشة</label>
                </div>
            </div>
          </div>
            
                <div class="form-group">
               <label for="plate_type_id" class="col-sm-2 control-label"> تصنيف اللوحة</label>
            <div class="col-sm-10">
             
              <select class="form-control" name="plate_type_id">
                <option value="">اختر نوع التصنيف</option>
                <option value="1">سياسي</option>
                <option value="0">اجتماعي</option>
                <option value="0">بيئيي</option>
                <option value="0">اقتصادي</option>
                <option value="0">كرة قدم</option>
                <option value="0">ثقافي</option>
              </select>
            </div>  </div>
        
        <div class="form-group">
               <label for="plate_type_id" class="col-sm-2 control-label"> البلدية </label>
            <div class="col-sm-10">
             
              <select onchange="showUser(this.value)" class="form-control" name="plate_type_id">
            <option value=""  >اختر البلدية التي سترخص اللوحة</option>
            @foreach($municipalitychoice as $jt)
            <option value="{{old("name")}}" >{{$jt->name}}</option>
            @endforeach
              </select>
            </div>
        </div>  
            
    <div class="form-group">
            <label for="price" class="col-sm-2 control-label"> </label>
            <div class="col-sm-10">
              <input id="txtHint" disabled  type="text" class="form-control" name="price_licenses_id" placeholder="سعر ترخيص اللوحة لهذه البلدية">
            </div>
          </div>
<script>
              console.log(showUser());

function showUser(str) {
        $.ajax({
  type: 'GET',
  url: '/code/getuser.php?q="+str',
  success: function (data) {
     document.getElementById("txtHint").innerHTML = data; 
  }
});
        xmlhttp.send();
    }

</script>
       
        <div class="form-group">
            <label for="from_date" class="col-sm-2 control-label">من تاريخ</label>
            <div class="col-sm-10">
              <input  type="text" value="{{old("from_date")}}" class="form-control" name="from_date" placeholder=" من تاريخ">
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
            </div>
          </div>
     <a class="btn btn-default" href="/client/plate">الغاء</a>

 <hr>

 <a class="btn btn-success btn-md" href="/client/confirm/{{$item->id}}/book" >
	 <i class="	fa fa-bookmark"></i>حجز الان </a>
	 

        </form>
 
@endsection