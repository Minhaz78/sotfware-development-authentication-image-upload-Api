<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Employee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<style>
    .err{
        color:red;
    }
</style>

</head>


<body>
<div class="jumbotron text-center" style="margin-bottom:2px">
  <h1>Create New Employee</h1>
</div>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark  fixed-top">
                <b class="navbar-brand">EMPLOYEE</b>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{URL::to('employees')}}">All Employee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{URL::to('create-employee')}}">Create New Employee</a>
                    </li>
                    </ul>
                </div>  
                </nav>
    <div class="container offset-3">
       
            
                <h1>Create Employee</h1>
           
            <div class="col-md-12">
                <form action="{{URL::to('/store-employee')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"><b>Name</b></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" placeholder="Name" required value="{{old('name')}}">
                            @if ($errors->has('name'))
                        <span class="err">{{ $errors->first('name') }}</span>
                        @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"><b>Email</b></label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" name="email_address" placeholder="Email" required value="{{old('email_address')}}">
                            @if ($errors->has('email_address'))
                        <span class="err">{{ $errors->first('email_address') }}</span>
                        @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"><b>Birthdate</b></label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="birth_date">
                            @if ($errors->has('birth_date'))
                        <span class="err">{{ $errors->first('birth_date') }}</span>
                        @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"><b>Salary</b></label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="salary" placeholder="Salary" required value="{{old('salary')}}">
                            @if ($errors->has('salary'))
                        <span class="err">{{ $errors->first('salary') }}</span>
                        @endif
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0"><b>Gender</b></legend>
                            <div class="col-sm-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="male">
                                    <label class="form-check-label">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="female">
                                    <label class="form-check-label">
                                        Female
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="other">
                                    <label class="form-check-label">
                                        other
                                    </label>
                                </div>
                                @if ($errors->has('gender'))
                        <span class="err">{{ $errors->first('gender') }}</span>
                        @endif
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"><b>Address</b></label>
                        <div class="col-sm-8">
                           <textarea class="form-control"name="address" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <div class="col-sm-2"><b>Active</b></div>
                        <div class="col-sm-8">
                            <div class="form-check">
                                <input class="form-check-input" name="is_active" type="checkbox" value="1">
                                
                            </div>
                           
                        </div>
                    </div> -->
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"><b>Department</b></label>
                        <div class="col-sm-8">
                        <select name="department" class="custom-select" >
                            <option selected>--Select--</option>
                            <!-- <option value="Computer Science & Engineering">Computer Science & Engineering</option>
                            <option value="Mechanical Engineering">Mechanical Engineering</option>
                            <option value="Civil Engineering">Civil Engineering</option> -->
                            @foreach( $departments as $d)
                            <option value="{{$d->id}}" @if (old('department') == $d->id) {{ 'selected' }} @endif>{{ $d->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('department'))
                        <span class="err">{{ $errors->first('department') }}</span>
                        @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success btn-sm col-10">Submit</button>
                        </div>
                    </div>
                    
                </form>
            </div>
       
    </div>

</body>

</html>