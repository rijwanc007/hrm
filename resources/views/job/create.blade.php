@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'user.store','method' => 'POST','enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> Add New Candidate</h3></div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter User Name" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Enter User Image" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter User Email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter User Phone Number" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_evening">NID</label>
                        <input type="file" class="form-control" id="nid" name="nid" placeholder="Enter User NID Number" required>
                    </div>
                    <div class="form-group">
                        <label for="designation">Designation</label>
                        <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter User Designation" required>
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="text" class="form-control" id="salary" name="salary" placeholder="Enter User Salary" required>
                    </div>
                    <div class="form-group">
                        <label for="grade">Grade</label>
                        <select class="form-control" id="grade" name="grade" required>
                            <option selected disabled value="">Choose An Option</option>
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="document">Document/CV</label>
                        <input type="file" class="form-control" id="document" name="document" placeholder="Enter User CV" required>
                    </div>
                    <div class="form-group">
                        <label for="joining_date">Joining Date</label>
                        <input type="date" class="form-control" id="joining_date" name="joining_date" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Ex:135/1 Polton,Dhaka-1000" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="8" placeholder="Enter Some Comment Or Important Information About Created User"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role" required>
                            <option selected disabled value="">Choose An Option</option>
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> Create Candidate </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
