@extends('website.master')
<div class="modal-body">
    @include('website.layouts.success')
    @include('website.layouts.error')
    <form action="{{route('employees.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="fname">Employee name</label>
                    <input required="required" name = "name" type="text" class="@error('name') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <label for="desc">Email</label>
                <input required="required" type="email" name="email" id="desc" cols="30" rows="10" class="@error('description') is-invalid @enderror form-control">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="desc">Password</label>
                <input required="required" type="password" name="password" id="desc" cols="30" rows="10" class="@error('description') is-invalid @enderror form-control">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="col-12">
                <div class="form-group">
            <select class="form-select" aria-label="Default select example" name="company_id">
                <option selected disabled>Select Company</option>
                @foreach($companies as $company)
                <option value="{{$company->id}}">{{$company->name}}</option>
                @endforeach
            </select>
                </div>
            </div>
            <br>
            <div class="col-12">
                <label for="desc">Logo</label>
                <input type="file" name="logo">
                @error('logo')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">add</button>
        </div>
    </form>
</div>
