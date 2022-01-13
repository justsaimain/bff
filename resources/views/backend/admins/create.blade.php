@extends('backend.layouts.app')
@section('title', 'Create Admin')

@section('content')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row my-5">
                        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                            <img src="{{ asset('assets/images/doodle/60.png') }}" class="img-fluid" alt="">
                            <div class="text-center">
                                <p class="h3">Current Admin Accounts</p>
                                <h2 class="font-weight-normal text-primary" data-plugin="counterup">
                                    {{ \App\Models\Admin::count() }}</h2>
                                <span>Accounts</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form action="{{ route('backend.admins.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" name="password" id="password" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Create</button>
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

    {!! JsValidator::formRequest('App\Http\Requests\AdminCreateRequest') !!}

@endsection
