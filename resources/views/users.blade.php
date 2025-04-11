<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />

</head>
<body>
    
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h5 class="text-center">Database with YAJRA</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-stripped dataTable">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created Time</th>
                                <th width="200px">Actions</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        $(document).ready(function(){
            $('.dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('users.data') }}",
                    type: 'GET'
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at', searchable: false},
                    { data: 'action', name: 'action', orderable:false, searchable: false}

                ]
            });

            $(document).on('click', '.delete-user', function(e){
                e.preventDefault();
                
                let id = $(this).data('id');

                if(confirm('Are you sure you want to delete this user?')){
                    $.ajax({
                        url: "{{route('user.delete', 'urlId')}}".replace('urlId', id),
                        type: 'DELETE',
                        success: function(response){
                            console.log(response);
                            if(response.status == 'success'){
                                $('.dataTable').DataTable().ajax.reload(function(){
                                    alert('User deleted successfully!');
                                }, false);
                            }else{
                                alert('Failed to delete user');
                            }
                        },
                        error: function(xhr){
                            alert('Error occurred while deleting user');
                        }
                    })
                }

                
                
            })
        })
    </script>
</body>
</html>
