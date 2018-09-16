

@section("content")
  <form class="row">
      
    <div class="col-sm-4">
      <input autofocus value="{{$q}}" class="form-control" type="text" name="q" placeholder="بحث بنوع اللوحة او تركيبها ">
    </div>
    <div class="col-sm-2">
      <button class="btn btn-primary " type="submit">
        <i class="glyphicon glyphicon-search"></i>بحث
      </button>
    </div>
    
  </form>
  
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

