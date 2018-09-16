@extends("client._layout")

@section("title")

الملف الشخصي
@endsection()


@section("content")
<form action="/client/home/profile" class="form-horizontal" method="post">
    {{csrf_field()}}
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">الاسم</label>
            <div class="col-sm-10">
              <input autofocus type="text" value="{{$item->name}}" class="form-control" id="name" name="name" placeholder="client Name">
            </div>
          </div>
    
    
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">البريد االالكتروني</label>
            <div class="col-sm-10">
              <input type="email" value="{{$item->email}}" class="form-control" id="email" name="email" placeholder="Email">
            </div>
          </div>
    
          <div class="form-group">
            <label for="mobile" class="col-sm-2 control-label">جوال</label>
            <div class="col-sm-10">
                <input type="number" value="{{$item->mobile}}" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
            </div>
          </div>
    
          <div class="form-group">
            <label for="sex" class="col-sm-2 control-label">الجنس</label>
            <div class="col-sm-10">
                <div class="radio">                
                <label><input {{$item->gender=="M"?"checked":""}} type="radio" id="gender" name="gender" value="M"/> ذكر</label>
                <label><input {{$item->gender=="F"?"checked":""}} type="radio" id="gender" name="gender" value="F"/> أنثى</label>
                </div>
            </div>
          </div>
    
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">تاريخ الميلاد </label>
            <div class="col-sm-10">
                <input type="date" value="{{$item->dob}}" class="form-control" id="dob" name="dob" placeholder="dob">
            </div>
          </div>
    
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
          </div>
        </form>


@endsection()