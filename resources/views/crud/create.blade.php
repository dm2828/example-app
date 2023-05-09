@extends('layouts.app-master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Page') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="/crud" method="post"  enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" required="required">
                            @if ($errors->has('title'))
                                <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Body</label>
                            <textarea name="post" id="" cols="10" rows="5" class="form-control" required="required"></textarea>
                            @if ($errors->has('post'))
                                <span class="text-danger text-left">{{ $errors->first('post') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="img">Image Upload</label>
                            <input type="file" name="img" class="form-control-file" id="img" required="required" accept="image/png, image/gif, image/jpeg">
                            @if ($errors->has('img'))
                                <span class="text-danger text-left">{{ $errors->first('img') }}</span>
                            @endif
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="status" name="status" checked>
                            <label class="form-check-label" for="status">Status</label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('crud.index') }}" class="btn btn-danger me-2">cancel</a>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection