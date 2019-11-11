@extends('layouts.base')
@section('title', 'Change Password')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">Change Password</h5>
                    </div>
                    <div class="card-body">
                        @include('partials.partials')
                        <form action="{{route('update-password')}}" method="post">
                            @csrf
                            @method('post')
                            <div class="row form-group">
                                <label class="col-form-label col-md-3">New Password</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="password" name="password">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-form-label col-md-3">Confirm Password</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="password" name="password_confirmation">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-8 offset-md-3">
                                    <input class="btn btn-outline-info" type="submit" value="Change Password">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection