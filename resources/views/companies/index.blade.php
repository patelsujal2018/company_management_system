@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Companies</h5>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('company.create') }}" class="btn btn-primary btn-sm">Add New Company</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Website</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($companies as $key => $c)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>
                                    @if($c->logo)
                                        <img src="{{ asset('/storage/companies/'.$c->logo) }}" width="100" height="100">
                                    @endif
                                </td>
                                <td>{{ $c->name }}</td>
                                <td>{{ $c->email }}</td>
                                <td><a href="{{$c->website}}" target="_blank">{{ $c->website }}</a></td>
                                <td>
                                    <form action="{{ route('company.destroy',$c->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('company.edit',$c->id) }}" class="btn btn-info btn-sm">Edit</a>

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
