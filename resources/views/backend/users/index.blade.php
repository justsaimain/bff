@extends('backend.layouts.app')
@section('title', 'View Users')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <table id="datatable" class="table table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            const table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('backend.datatable.users.ssd') !!}',
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $(document).on('click', '.admin-delete-btn', function() {
                let id = $(this).data('id');

                toastr.error(
                    '<div class="d-flex justify-content-between align-items-center admin-confirm-delete-btn" data-id="' +
                    id +
                    '"><span>Are you sure to delete.</span><button type="button" id="" class="btn btn-danger btn-xs">Yes</button></div', {
                        "showDuration": 8000
                    });


            });

            $(document).on('click', '.admin-confirm-delete-btn', function() {
                let id = $(this).data('id');

                $.ajax({
                    type: 'POST',
                    url: `/backend/users/${id}`,
                    data: {
                        _method: "DELETE"
                    },
                    success: function(data) {
                        table.ajax.reload();
                        toastr.success('Account Deleted.')
                    }
                });
            })
        })
    </script>

@endsection
