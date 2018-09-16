@extends("admin._layout")

@section("title")
تفاصيل اللوحة
@endsection



@section("content")
<dl class="dl-horizontal">
   <dt>صورة اللوحة</dt>
    <dd>{{$item->photo}}</dd>
    <dt>الرقم</dt>
    <dd>{{$item->id}}</dd>
    <dt>نوع اللوحه</dt>
    <dd>{{$item->type}}</dd>
    <dt>الشارع المتواجده فيه</dt>
    <dd>{{$item->street}}</dd>
    <dt>المنطقة </dt>
    <dd>{{$item->region}}</dd>
    <dt>تفاصيل العنوان</dt>
    <dd>{{$item->details_address}}</dd>
	<dt>تاريخ الانشاء</dt>
    <dd>{{$item->created_at}}</dd>	
	<dt>ابعادها</dt>
    <dd>{{$item->Dimentions}}</dd>
	<dt>موقعها على الخريطة</dt>
    <dd>{{$item->Gps}}</dd>
    <dt>اتجاهها</dt>
    <dd>{{$item->direction}}</dd>
    <dt>التفاصيل</dt>
    <dd>{{$item->details}}</dd>
    <dt>شكل الطباعة</dt>
    <dd>{{$item->printing}}</dd>
    <dt>شكل التركيب</dt>
    <dd>{{$item->Composition}}</dd>
    <dt>سعر التمديد الكهربائي لها</dt>
    <dd>{{$item->price_electric}}</dd>
    <dt>سعر الترخيص</dt>
    <dd>{{$item->price_licenses_id}}</dd>
</dl>

<a class="btn btn-default" href="/admin/plate">الغاء</a>
<hr>
 <a class="btn btn-danger Confirm btn-md" href="/admin/plate/{{$item->id}}/delete" >
	 <i class="fa fa-trash"></i>حذف اللوحة</a>
@endsection