@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Employee</div>
                <div class="card-body">
                    <form method="post" action="{{ route('employee.update',$employee->id) }}" role="form">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="employee_id" value="{{$employee->id}}" />

                        <div class="form-group mb-3">
                            <label>First Name</label>
                            <input name="first_name" type="text" class="form-control" placeholder="Enter First Name" value="@if(old('first_name')){{old('first_name')}}@else{{$employee->first_name}}@endif">
                            @if ($errors->has('first_name'))
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label>Last Name</label>
                            <input name="last_name" type="text" class="form-control" placeholder="Enter First Name" value="@if(old('last_name')){{old('last_name')}}@else{{$employee->last_name}}@endif">
                            @if ($errors->has('last_name'))
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input name="email" type="text" class="form-control" placeholder="Enter Company Name" value="@if(old('email')){{old('email')}}@else{{$employee->email}}@endif">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label>Phone</label>
                            <input name="phone" type="text" class="form-control" placeholder="Enter Phone" value="@if(old('phone')){{old('phone')}}@else{{$employee->phone}}@endif">
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label>Select Company</label>
                            <select name="company_name" class="form-control">
                                <option value="">select company</option>
                                @forelse($companyList as $c)
                                    <option value="{{ $c->id }}" @if($c->id == $employee->company_id) selected @endif>{{ $c->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('company_name'))
                                <span class="text-danger">{{ $errors->first('company_name') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" name="save" class="btn btn-primary">Save</button>
                            <a href="{{route('employee.index')}}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
