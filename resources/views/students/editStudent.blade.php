<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Manegent</title>
</head>
<body>
<form method="POST" action="{{ route('edit-student' , $students->id) }}" >
                {!! csrf_field() !!}
                <br>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10"> 
                        <input type="text" name="name" id="name" value="{{$students->name}}" class="form-control">
                        </div>
                    </div> <br>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Age</label>
                        <div class="col-sm-10">
                        <input type="text" name="age" id="age" value="{{$students->age}}" class="form-control">
                        </div>
                    </div> <br>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                        <input type="text" name="gender" id="gender" value="{{$students->gender}}" class="form-control">
                        </div>
                    </div> <br>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Reporting Teacher</label>
                        <div class="col-sm-10">
                        <select name="teachers" id="teachers">
                            <option value="{{$students->teachers_id}}">{{$students->reporting_teacher}}</option>
                            @foreach($teachers as $teacher)
                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div> <br>
                  
                    <input type="submit" style="background-color:#000000a1; color:#fff" onclick="submit()" >
                </form>
</body>
</html>

