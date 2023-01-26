@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Company</div>
                <div class="card-body">
                    <form method="post" action="{{ route('company.store') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label>Company Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter Company Name" value="@if(old('name')){{old('name')}}@endif">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label>Company Email</label>
                            <input name="email" type="text" class="form-control" placeholder="Enter Company Name" value="@if(old('email')){{old('email')}}@endif">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label>Company Website</label>
                            <input name="website" type="text" class="form-control" placeholder="Enter Company Name" value="@if(old('website')){{old('website')}}@endif">
                            @if ($errors->has('website'))
                                <span class="text-danger">{{ $errors->first('website') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label>Company Logo</label>
                            <input type="file" class="form-control" name="logo">
                            @if ($errors->has('logo'))
                                <span class="text-danger">{{ $errors->first('logo') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" name="save" class="btn btn-primary">Save</button>
                            <a href="{{route('company.index')}}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
