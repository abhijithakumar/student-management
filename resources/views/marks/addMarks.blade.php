<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('../Dashboard') }}
        </h2>
    </x-slot>
<form method="POST" action="{{ route('add-marks') }}" >
                {!! csrf_field() !!}
                    <input type="text" hidden name="id" id="id" class="form-control" value="2">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Term</label>
                        <div class="col-sm-10">
                        <input type="text" name="term" id="term" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Maths</label>
                        <div class="col-sm-10">
                        <input type="number" name="maths" id="maths" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Science</label>
                        <div class="col-sm-10">
                        <input type="number" name="science" id="science" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">History</label>
                        <div class="col-sm-10">
                        <input type="number" name="history" id="history" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Student</label>
                        <div class="col-sm-10">
                        <select name="students" id="students">
                            <option value="">---</option>
                            @foreach($students as $student)
                            <option value="{{$student->id}}">{{$student->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                  
                    <input type="submit" style="background-color:#000000a1; color:#fff" onclick="submit()" >
                </form>
</x-app-layout>