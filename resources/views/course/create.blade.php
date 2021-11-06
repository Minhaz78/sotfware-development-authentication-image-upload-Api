<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Create Course</title>
</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-6 offset-md-3">
        <h2>Create Course</h2>
        <form action="{{ URL::to('/store-course') }}" method="post" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Course Name</label>
                <input class="form-control" type="text"name="course_name">
            </div>
            <div class="form-group">
                <label for="">Course Code</label>
                <input class="form-control" type="text"name="course_code">

            </div>
            <div  class="form-group">
                <label for="">Course Type</label>
                <select class="form-control" name="course-type" id="">
                    <option value="">select type</option>
                    <option value="lab">Lab</option>
                    <option value="theory">Theory</option>
                </select>                
            </div>
            <div  class="form-group">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
        </div>
        
        </div>
        
    </div>
</body>
</html>