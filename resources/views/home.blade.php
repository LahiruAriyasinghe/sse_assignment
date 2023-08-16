@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="container mt-3">
    <h3 class="mb-3">Home</h3>
        <table class="table table-bordered courses-table">
            <thead>
                <tr>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Category</th>
                    <th>Start date</th>
                    <th>Thumbnail</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
function addtoFavourite(id) {
  $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ route('student_course.store') }}",
        method: 'POST',
        data: { course_id: id},
        dataType:"json",
        success:function(response)
        {
            console.log("Success");
            // $(form).trigger("reset");
            alert(response.success)
        },
        error: function(response) {
            console.log(response.status);
            if(response.status == 401){
                alert("You need to login first")
            }else{
                alert(response.message) 
            }
            
        }
    });
}
</script>
<script type="text/javascript">
  $(function () {
    
    var table = $('.courses-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('courses.list') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'category', name: 'category'},
            {data: 'created_at', 
                "render": function (data) {
                            var date = new Date(data);
                            var month = date.getMonth() + 1;
                            return (month.length > 1 ? month : "0" + month) + "/" + date.getDate() + "/" + date.getFullYear() ; 
                            //return date;
                        }
                    },
            {
                "data": "thumbnail",
                "render": function(data, type, row) {
                    return '<img src="'+data+'" style="height:50px;width:50px;"/>';
                }
            },
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
});
</script>
@endsection
