@extends("client._layout")

@section("title")
السلة الشرائية 
@endsection

@section("content")
<table class="table table-striped table-hover">
    <thead>
        <tr><th>رقم اللوحة</th><th width="15%">اللوحة</th><th>البلدية المرخصة</th><th>مرخصة بسعر</th><th>نوع اللوحة</th><th> الشارع</th><th >سعر تمديدها</th><th width="15%" > </th>
            
        </tr>
    </thead>
    <tbody>
        
    {{--      @foreach($items as $i)
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
				 <a href="#" class="btn btn-info btn-xs">
                    <i class="glyphicon glyphicon-info-sign"></i>
                </a>
                     <a href="#" class="btn btn-primary btn-xs">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="#" class="Confirm btn btn-danger btn-xs">
                        <i class="fa fa-trash"></i>
                    </a>
            </td>
        </tr>
          @endif @endforeach
        
        --}}
        </tbody>
        
</table>

@endsection
