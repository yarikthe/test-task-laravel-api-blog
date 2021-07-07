@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    You are Admin.
                      <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.news') }}">{{ __('News') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.category') }}">{{ __('Category') }}</a>
                                </li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection