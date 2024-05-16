@extends('layouts.app')

@section('content')

    <div class="container">
        <h3 align="center"  class="mt-5">Employee Update Page</h3>
        <div class="row">
           <div class="row d-flex justify-content-center"  >
                <div class="col-md-5">
                <div class="form-area">
                   <form method="POST" action="{{ route('employee.update', $employee->id) }}" class="col-md-8">
                        {!! csrf_field() !!}
                        @method("PATCH")
                        <div class="row">
                            <div >
                                <label>Employee First Name</label>
                                <input type="text" class="form-control" name="emp_firstname" value="{{$employee->emp_firstname}}">
                            </div>
                            <div >
                                <label>Employee Last Name</label>
                                <input type="text" class="form-control" name="emp_lastname" value="{{$employee->emp_lastname}}">
                            </div>
                           <div >
                                <label>Employee Email</label>
                                <input type="email" class="form-control" name="emp_email" value="{{$employee->emp_email}}">
                            </div>
                            <div >
                                <label>Employee Phone</label>
                                <input type="tel" class="form-control" name="emp_phone" value="{{$employee->emp_phone}}">
                            </div>
                            <div >
                                <label>Employee Address</label>
                                <input type="text" class="form-control" name="emp_address" value="{{$employee->emp_address}}">
                            </div>
                            <div >
                                <label>Employee Birthday</label>
                                <input type="date" class="form-control" name="emp_birthday" value="{{$employee->emp_birthday}}">
                            </div>
                            <div >
                                <label>Employee Title</label>
                                <input type= 'text' class="form-control" name="emp_title" value="{{$employee->emp_title}}">
                            </div>
                            <div class="col-md-6 mt-3 ">
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </div>
                        <div class="row">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @endsection

        @push('css')
            <style>
                .form-area{
                    padding: 20px;
                    margin-top: 20px;
                    background-color:#b3e5fc;
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
