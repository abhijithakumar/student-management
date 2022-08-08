<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Manegent</title>
</head>
<body>
<form method="POST" action="{{ route('edit-marks' , $marks->id) }}" >
                {!! csrf_field() !!}
                <br>
                <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Term</label>
                        <div class="col-sm-10"> 
                        <input type="text" name="term" id="term" value="{{$marks->term}}" class="form-control">
                        </div>
                    </div> <br>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Maths</label>
                        <div class="col-sm-10"> 
                        <input type="text" name="maths" id="maths" value="{{$marks->maths}}" class="form-control">
                        </div>
                    </div> <br>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Science</label>
                        <div class="col-sm-10">
                        <input type="text" name="science" id="science" value="{{$marks->science}}" class="form-control">
                        </div>
                    </div> <br>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">History</label>
                        <div class="col-sm-10">
                        <input type="text" name="history" id="history" value="{{$marks->history}}" class="form-control">
                        </div>
                    </div> <br>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Student</label>
                        <div class="col-sm-10">
                        <select name="students" id="students">
                            <option value="{{$marks->students_id}}">{{$marks->name}}</option>
                            @foreach($students as $student)
                            <option value="{{$student->id}}">{{$student->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div> <br>
                  
                    <input type="submit" style="background-color:#000000a1; color:#fff" onclick="submit()" >
                </form>
</body>
</html>

