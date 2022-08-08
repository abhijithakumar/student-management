<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('../Dashboard') }}
        </h2>
    </x-slot>
    <table id="myTable" class="display">
    <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Reporting Teacher</th>
            <th>Action</th>
        </tr>
        <tbody>
            @foreach($students as $student)
        <tr>
            <td>{{$student->name}}</td>
            <td>{{$student->age}}</td>
            <td>{{$student->gender}}</td>
            <td>{{$student->reporting_teacher}}</td>
            <td><a href="{{route('edit-student-view',['id', $student->id])}}">Edit</a> || <button onclick="deleteStudent({{$student->id}})">Delete</button></td>
            
        </tr>
        @endforeach
      
    </tbody>
    </thead>
    <tbody>
    </tbody>
</table>
</x-app-layout>
<script>
  
// $('#myTable').DataTable( {
//     ajax: {
//         url: '/students-list',
//         dataSrc: ''
//     },
//     columns: [
//         { data: 'name' },
//         { data: 'age' },
//         { data: 'gender' },
//         { data: 'reporting_teacher' },
//         {"mRender": function ( data, type, row ) {
//                     let url = ''
//                      url = {!! json_encode(URL::to('/')) !!}
//                     console.log(url)
//                         return '<a href="'+url+'/ajax-edit-student/'+row['id']+'">Edit</a>';}
//                 }
//     ],
    
// } );
function deleteStudent(id){
    $.ajax({
  url: "{{ route('delete-student',['id', $student->id])}}",
  type: "POST",
  data: {
        "_token": "{{ csrf_token() }}",
        "id": id
        }
});
    
}
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>