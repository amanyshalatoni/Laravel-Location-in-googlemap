@extends("admin._layout")

@section("title")
تفاصيل العميل
@endsection



@section("content")
<dl class="dl-horizontal">
    <dt>الاسم</dt>
    <dd>{{$item->name}}</dd>
    <dt>الايميل</dt>
    <dd>{{$item->email}}</dd>
    <dt>فعال؟</dt>
    <dd>{{$item->active}}</dd>
    <dt>رقم الجوال</dt>
    <dd>{{$item->mobile}}</dd>
    <dt>رقم اللوحة</dt>
    <dd>{{$item->logo}}</dd>
	<dt>صورة اللوحة</dt>
    <dd>{{$item->created_at}}</dd>	
	<dt>العنوان</dt>
    <dd>{{$item->address}}</dd>
	<dt>التفاصيل</dt>
    <dd>{{$item->details}}</dd>
	<dt>نوع اللوحة</dt>
    <dd>{{$item->details}}</dd>
	<dt>اسم البلدية</dt>
    <dd>{{$item->details}}</dd>
	<dt>سعر التمديد الكهربائي لها</dt>
    <dd>{{$item->details}}</dd>
	<dt>سعر الترخيص</dt>
    <dd>{{$item->details}}</dd>
</dl>

<a class="btn btn-default" href="/admin/client">الغاء</a>
<hr>
 <a class="btn btn-danger Confirm btn-md" href="/admin/client/{{$item->id}}/delete" >
	 <i class="fa fa-trash"></i>حذف العميل</a>
@endsection