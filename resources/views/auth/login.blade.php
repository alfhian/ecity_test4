@extends('layouts.auth')

@section('content')

@if(Session::has('errors'))
<div class="w-100 position-absolute d-flex justify-content-end">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <small><strong>Login Failed.</strong> {{session('errors')->first('failed');}}</small>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
</div>
@endif

<div class="h-100 d-flex align-items-center justify-content-center">
    <div class="w-50 p-3 card bg-white">
        <div class="card-body">
            <h3 class="mb-4 text-center">HRIS</h3>
            <div class="mb-5 d-flex justify-content-center">
                <form method="post" action="{{ route('login') }}" class="w-50">
                    <div class="form-group">
                        @csrf
                        <label for="username" class="text-muted small">Username</label>
                        <input type="text" name="username" id="username" class="mb-3 form-control form-control-sm">
                        <label for="password" class="text-muted small">Password</label>
                        <input type="password" name="password" id="password" class="mb-3 form-control form-control-sm">
                        <div class="d-flex justify-content-center">
                            <input type="submit" name="login" class="w-75 btn btn-sm btn-primary" value="Login">
                        </div>
                    </div>
                </form>
            </div>
            <div class="text-center">
                <small class="text-muted">Copyright © 2022 Alfhian Suwandi. All Rights Reserved.</small>
            </div>
        </div>
    </div>
</div>

@endsection