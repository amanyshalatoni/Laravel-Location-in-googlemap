@extends("client._layout")

@section("title")
ارسال بياناتي الشخصية لحجز هذه اللوحة
@endsection

@section("content")

				@include("_msg")
			<!-- Start post Area -->
			<section class="post-area section-gap">
				<div class="container">
                    <form method="post" enctype="multipart/form-data" action="/client/confirm/{{$item->id}}/apply" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="fullname" class="col-sm-2 control-label">الاسم</label>
                            <div class="col-sm-10">
                              <input autofocus type="text" value="{{$item->name}}" class="form-control" id="name" name="name" placeholder="Client Name">
                            </div>
                          </div>


                          <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">البريد االالكتروني</label>
                            <div class="col-sm-10">
                              <input type="email" value="{{$item->email}}" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="country_id" class="col-sm-2 control-label">جوال</label>
                            <div class="col-sm-10">
                                <input type="number" value="{{$item->mobile}}" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
                            </div>
                          </div>
                        

    
                        <hr>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                @if($item==NULL)
              <button type="submit" class="btn btn-lg btn-primary">احجز الان</button>
                @else
                <span class="alert alert-success">لقد تم التقدم لطلب الحجز بنجاح</span>
                @endif
            </div>
          </div>
                    </form>
				</div>	
			</section>

    @endsection()