@extends("municipality._layout")

@section("title")
ادارة اللوحات
@endsection

@section("subtitle")

@endsection

@section("content")
  <form class="row">
      
    <div class="col-sm-2">
      <input autofocus value="{{$q}}" class="form-control" type="text" name="q" placeholder=" بحث باللوحة">
    </div>  
   
    <div class="col-sm-2">
      <select class="form-control" name="typeplate">
        <option value="">جميع الانواع</option>
          
      </select>
    </div>
    
    <div class="col-sm-2">
      <select class="form-control" name="pricel">
        <option value="">سعر الترخيص </option>
        
      </select>
    </div>
    <div class="col-sm-2">
      <select class="form-control" name="priceat">
        <option value="">تاريخ الترخيص </option>
      </select>
    </div>
    <div class="col-sm-2">
      <button class="btn btn-primary " type="submit">
        <i class="glyphicon glyphicon-search"></i>بحث
      </button>
    </div>
     <div class="col-sm-2 text-right">
    <a class="btn btn-success" href="/municipality/plate/create">
        <i class="fa fa-plus"></i> اضافة</a>
    </div>
  </form>
  <br><br>
  <table class="table table-hover">
    <thead><tr>
    <th >اللوحة</th><th >نوع اللوحة</th><th >العميل</th><th>سعر الترخيص</th ><th>مكان اللوحة</th><th >فعال؟</th><th>تاريخ الترخيص</th>
        <th width="3%"></th><th width="3%"></th><th width="3%"></th>
    </tr></thead>
    <tbody>
      @foreach($plates as $j)
      <tr>
        <td>{{$j->photo}}</td>
        <td>{{$j->plate_type_id}}</td>
        <td>{{$j->client_id}}</td>
        <td>{{$j->price_licenses_id}}</td>
        <td>{{$j->street}}</td>
        <td>{{$j->active==1?"فعال":"غير فعال"}}</td>

        <td>{{$j->created_at}}</td>
        <td>
          </td><td>
               <a href="/municipality/plate/{{$j->id}}/delete" class="confirm btn btn-danger btn-xs">
                <i class="fa fa-trash"></i>
          </a>
        </td>
           <td>
                     @if(!$j->active)
          <a href="/municipality/plate/{{$j->id}}/edit" class="btn btn-primary btn-xs">
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>
               @endif
        </td>
        <td>
               @if(!$j->active)
         
               <a href="/municipality/plate/{{$j->id}}" class="btn btn-info btn-xs">
                <i class="fa fa-tv"></i>
          </a>
            @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <br>
  {{$plates->links()}}

@endsection

@section("js")
  <script>
      $(document).ready(function () { //
          $(".longString").each(function () {
              var maxwidth = 8;
              if ($(this).text().length > maxwidth) {
                  $(this).text($(this).text().substring(0, maxwidth));
                  $(this).html($(this).html() + '...');
              }
          });
      });
  </script>
endsection

