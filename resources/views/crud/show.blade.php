@extends('layouts.app-master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('crud.index') }}" class="btn btn-danger me-2">< Back</a> {{ __('View Page') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>{{$crud->title}}</h2>

                    <p>{{$crud->post}}</p>
                    <br>
                    <div>
                        <img src='{{ asset("/upload/$crud->img") }}' width="300px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection