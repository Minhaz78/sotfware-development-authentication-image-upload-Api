<html lang="en">
<head>
  <title>Laravel  Image Intervention</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
  
  <div class="container">
    <h3 class="jumbotron">Laravel  Image Intervention </h3>
    <form method="post" action="{{ URL::to('upload-image')}}" enctype="multipart/form-data">
      {{ csrf_field() }}
        <div class="row">
          <div class="col-md-4">
          <input type="text" name="alttext" class="form-control">
          </div>
          <div class="form-group col-md-4">
          <input type="file" name="filename[]" id="filename" class="form-control" multiple>
          <img width="200px" id="blah" src="#" alt=" See your selected images here." />
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          <button type="submit" class="btn btn-success" style="margin-top:10px">Upload Image</button>
          </div>
        </div>     
  </form>

  <div>
    @if($images)
      @foreach($images as $img)
      <img width="200px" src="{{ asset('thumbnail/'.$img->filename)}}" alt="" >
      @endforeach
    @endif
  </div>
  </div>


<script>
    $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img style="width: 180px; height: 180px; overflow: hidden;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#filename').on('change', function() {
        imagesPreview(this, '#blah');
    });
});

</script>
</body>
</html>