@extends('backend.layouts.app')
@section('title', 'View Admin Details')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row my-5">
                        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                            <img src="{{ asset('assets/images/doodle/12.png') }}" class="img-fluid" alt="">
                            <div class="text-center">
                                <p class="h3">Admin Account Details</p>
                                <p>Account Created at : {{ $admin->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p>Admin Account Informations</p>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ $admin->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $admin->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td>{{ $admin->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>IP</td>
                                        <td>{{ $admin->ip }}</td>
                                    </tr>
                                    <tr>
                                        <td>User Agent</td>
                                        <td>{{ $admin->getUserAgent($admin->id) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a type="button" class="btn btn-secondary" href="{{ url()->previous() }}">Go Back</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')



@endsection
