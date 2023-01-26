@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Employees</h5>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('employee.create') }}" class="btn btn-primary btn-sm">Add New Employee</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($employees as $key => $e)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{ $e->first_name }} {{ $e->last_name }}</td>
                                <td>{{ $e->company->name }}</td>
                                <td>{{ $e->email }}</td>
                                <td>{{ $e->phone }}</td>
                                <td>
                                    <form action="{{ route('employee.destroy',$e->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('employee.edit',$e->id) }}" class="btn btn-info btn-sm">Edit</a>

                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">No Records</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
