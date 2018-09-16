
<form action="/admin/adminajax" class="ajaxForm form-horizontal" method="post">
    {{csrf_field()}}
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">اسم المستخدم</label>
            <div class="col-sm-10">
              <input autofocus type="text" value="{{old("name")}}" class="form-control" name="name" placeholder="ادخل اسم المستخدم">
            </div>
          </div>
    
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">البريد الالكتروني</label>
            <div class="col-sm-10">
              <input type="text" value="{{old("email")}}" class="form-control" name="email" placeholder="ادخل البريد الالكتروني">
            </div>
          </div>
    
          <div class="form-group">
            <label for="password" class="col-sm-2 control-label"> كلمة المرور</label>
            <div class="col-sm-10">
              <input type="password" value="{{old("password")}}" class="form-control" name="password" placeholder="ادخل كلمة المرور">
            </div>
          </div>
    
          <div class="form-group">
            <label for="mobile" class="col-sm-2 control-label">رقم الجوال</label>
            <div class="col-sm-10">
              <input type="number" value="{{old("mobile")}}" class="form-control" name="mobile" placeholder="ادخل رقم الجوال">
            </div>
          </div>
    
    
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <label><input {{old("active")?"checked":""}}  type="checkbox" name="active" value="1"/> فعال</label>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">اضافة</button>
                <a class="btn btn-default" data-dismiss="modal" href="/admin/adminajax">الغاء الامر</a>
            </div>
          </div>
        </form>
        
       
<script>
    PageLoadMethods();
</script>