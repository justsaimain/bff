@extends('backend.layouts.app')
@section('title', 'Edit Admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row my-5">
                        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                            <img src="{{ asset('assets/images/doodle/42.png') }}" class="img-fluid" alt="">
                            <div class="text-center">
                                <p class="h3">Edit Admin Account</p>
                                <p>Last Updated : {{ $admin->updated_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form action="{{ route('backend.admins.update', $admin->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{ $admin->name }}" id="name"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" value="{{ $admin->email }}" id="email" @if ($admin->id != Auth::id())
                                    readonly
                                    @endif
                                    class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" value="{{ $admin->phone }}" id="phone"
                                        class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                            </form>
                            <hr>
                            <form action="{{ route('backend.admin.change.password', $admin->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="text" name="current_password" id="current_password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="text" name="new_password" id="new_password" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Change Password</button>
                                <a type="button" class="btn btn-secondary" href="{{ url()->previous() }}">Go Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\UpdateAdminRequest') !!}

@endsection
