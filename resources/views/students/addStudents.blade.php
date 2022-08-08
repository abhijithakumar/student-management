<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('../Dashboard') }}
        </h2>
    </x-slot>
<form method="POST" action="{{ route('add-student') }}" >
                {!! csrf_field() !!}
                    <input type="text" hidden name="id" id="id" class="form-control" value="2">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                        <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Age</label>
                        <div class="col-sm-10">
                        <input type="text" name="age" id="age" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                        <input type="text" name="gender" id="gender" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Reporting Teacher</label>
                        <div class="col-sm-10">
                        <select name="teachers" id="cars">
                            <option value="">---</option>
                            @foreach($teachers as $teacher)
                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                  
                    <input type="submit" style="background-color:#000000a1; color:#fff" onclick="submit()" >
                </form>
</x-app-layout>