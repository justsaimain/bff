
@extends('backend.layouts.app')
@section('title', 'Clubs / Teams')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Short Name</th>
                            <th>Played</th>
                            <th>Win</th>
                            <th>Loss</th>
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
                ajax: '{!! route('backend.datatable.clubs.ssd') !!}',
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'logo_small',
                        name: 'logo'
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'short_name',
                        name: 'short_name'
                    },
                    {
                        data: 'played',
                        name: 'played',
                    },
                    {
                        data: 'win',
                        name: 'win'
                    },
                    {
                        data: 'loss',
                        name: 'loss'
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
