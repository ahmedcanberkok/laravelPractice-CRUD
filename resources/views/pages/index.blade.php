@extends('layouts.app')

@section('content')

    <div class="container">
        <h3 align="center" class="mt-5">Employee Register Pages</h3>
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">

                <div class="form-area">

                    <form method="POST" action="{{ route('employee.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <label>Employee First Name</label>
                                <input type="text" class="form-control" name="emp_firstname">
                            </div>
                            <div class="col-md-6">

                                <label>Employee Last Name</label>
                                <input type="text" class="form-control" name="emp_lastname">
                            </div>
                            <div class="col-md-6">
                                <label>Employee Email</label>
                                <input type="email" class="form-control" name="emp_email">
                            </div>
                            <div class="col-md-6">
                                <label>Employee Phone</label>
                                <input type="tel" class="form-control" name="emp_phone">
                            </div>
                            <div class="col-md-6">
                                <label>Employee Address</label>
                                <input type="text" class="form-control" name="emp_address">
                            </div>
                            <div class="col-md-6">
                                <label>Employee Birthday</label>
                                <input type="date" class="form-control" name="emp_birthday">

                            </div>
                            <div class="col-md-6">
                                <label>Employee Title</label>
                                <input type= 'text' class="form-control" name="emp_title">

                            </div>
                        </div>
                        <div class="row">

                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <input type="submit" class="btn btn-info" value="Register">
                            </div>

                        </div>
                    </form>
                </div>

                <table class="table mt-5">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Employee First Name</th>
                        <th scope="col">Employee Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Title</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $key = 0; ?> @foreach($employees as $employee)
                        <tr>
                            <th scope="col">{{ ++$key }}</th>
                            <th scope="col">{{ $employee->emp_firstname }}</th>
                            <th scope="col">{{ $employee->emp_lastname }}</th>
                            <th scope="col">{{ $employee->emp_email }}</th>
                            <th scope="col">{{ $employee->emp_phone }}</th>
                            <th scope="col">{{ $employee->emp_address }}</th>
                            <th scope="col">{{ $employee->emp_birthday }}</th>
                            <th scope="col">{{ $employee->emp_title }}</th>

                            <td scope="col">
                                <a href="{{  route('employee.edit', $employee->id) }}">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                    </button>
                                </a>
                                <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" style ="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection


@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
            background-color:#FFFF00;
        }

        .bi-trash-fill{
            color:red;
            font-size: 18px;
        }

        .bi-pencil{
            color:green;
            font-size: 18px;
            margin-left: 20px;
        }
    </style>
@endpush
