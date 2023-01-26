@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Company</div>
                <div class="card-body">
                    <form method="post" action="{{ route('company.update',$company->id) }}" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="company_id" value="{{$company->id}}" />

                        <div class="form-group mb-3">
                            <label>Company Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter Company Name" value="@if(old('name')){{old('name')}}@else{{$company->name}}@endif">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label>Company Email</label>
                            <input name="email" type="text" class="form-control" placeholder="Enter Company Name" value="@if(old('email')){{old('email')}}@else{{$company->email}}@endif">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label>Company Website</label>
                            <input name="website" type="text" class="form-control" placeholder="Enter Company Name" value="@if(old('website')){{old('website')}}@else{{$company->website}}@endif">
                            @if ($errors->has('website'))
                                <span class="text-danger">{{ $errors->first('website') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label>Company Logo</label>
                            @if($company->logo)
                                <img src="{{ asset('/storage/companies/'.$company->logo) }}" width="100" height="100">
                            @endif
                            <input type="file" class="form-control" name="logo">
                            @if ($errors->has('logo'))
                                <span class="text-danger">{{ $errors->first('logo') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                            <a href="{{route('company.index')}}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
