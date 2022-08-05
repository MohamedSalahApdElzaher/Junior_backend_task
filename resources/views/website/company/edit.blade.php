@extends('website.master')
<div class="modal-body">
    @include('website.layouts.success')
    @include('website.layouts.error')
    <form action="{{route('companies.update', $company->id)}}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="fname">Company name</label>
                    <input value="{{$company->name}}" required="required" name = "name" type="text" class="@error('name') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <label for="desc">Address</label>
                <input required="required" value="{{$company->address}}" type="text" name="address" id="desc" cols="30" rows="10" class="@error('description') is-invalid @enderror form-control">
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div><br>
            <div class="col-12">
                <label for="desc">Logo</label>
                <input type="file" name="logo">
                @error('logo')
                <div class="alert alert-danger">
                   {{$message}}</div>
                @enderror
                <br>
                <img src="{{ asset($company->logo) }}" style="width: 50px;height: 50px" alt="">
            </div>
        </div>

        <div class="modal-footer">
            <input type="hidden" name="id" value="{{$company->id}}">
            <button type="submit" class="btn btn-primary">update</button>
        </div>
    </form>
</div>
