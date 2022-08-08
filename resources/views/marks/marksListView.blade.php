<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('../Dashboard') }}
        </h2>
    </x-slot>
    <table id="myTable" class="display">
    <thead>
        <tr>
            <th>Student</th>
            <th>Term</th>
            <th>Maths</th>
            <th>Science</th>
            <th>History</th>
            <th>Total Marks</th>
            <th>Action</th>
        </tr>
        <tbody>
            @foreach($marks as $mark)
        <tr>
            <td>{{$mark->name}}</td>
            <td>{{$mark->term}}</td>
            <td>{{$mark->maths}}</td>
            <td>{{$mark->science}}</td>
            <td>{{$mark->history}}</td>
            <td>{{$mark->total_marks}}</td>
            <td><a href="{{route('edit-marks-view', ['id' => $mark->id])}}">Edit</a> || <button onclick="deleteMarks({{$mark->id}})">Delete</button></td>
            
        </tr>
        @endforeach
      
    </tbody>
    </thead>
    <tbody>
    </tbody>
</table>
</x-app-layout>
<script>

$(document).ready( function () {
    $('#myTable').DataTable();
} );
function deleteMarks(id){
$.ajax({
  url: "{{ route('delete-student',['id', $student->id])}}",
  type: "POST",
  data: {
        "_token": "{{ csrf_token() }}",
        "id": id
        }
});
    
}
</script>