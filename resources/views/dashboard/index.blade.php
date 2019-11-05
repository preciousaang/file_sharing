@extends('layouts.base')
@section('title', "Admin Dashboard")
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav card-header-tabs nav-tabs justify-content-end">
                            <li class="nav-item">
                                <a href="{{route('dashboard')}}" class="nav-link">Staff</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('students')}}" class="nav-link">Students</a>
                            </li>
                          
                        </ul>
                    </div>
                    <div class="card-body">
                        @include('partials.partials')
                        @if (request()->segment(2)=='students')
                            @include('dashboard.students')
                            @elseif(request()->segment(2)=='')
                            @include('dashboard.staff')
                        @else
                            kjkk
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection