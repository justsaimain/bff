@extends('backend.layouts.app')
@section('title', 'Players / Elements')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Profile</th>
                            <th>First Name</th>
                            <th>Second Name</th>
                            <th>Position</th>
                            <th>Team</th>
                            <th>Now Cost</th>
                            <th>Total Points</th>
                            <th>Action</th>
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
                ajax: '{!! route('backend.datatable.players.ssd') !!}',
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'photo_small',
                        name: 'profile'
                    },
                    {
                        data: 'first_name',
                        name: 'first_name',
                    },
                    {
                        data: 'second_name',
                        name: 'second_name'
                    },
                    {
                        data: 'element_type',
                        name: 'position',
                    },
                    {
                        data: 'team',
                        name: 'team',
                    },
                    {
                        data: 'now_cost',
                        name: 'now_cost'
                    },
                    {
                        data: 'total_points',
                        name: 'total_points'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                columnDefs: [{
                        targets: "_all",
                        className: ["text-center"],
                    },
                    {
                        targets: 1,
                        width: "10%"
                    },
                ],
            });
        })
    </script>

@endsection

@section('style')


@endsection
