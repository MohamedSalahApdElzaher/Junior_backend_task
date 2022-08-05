@extends('website.master')
<div class="modal-body">
    @include('website.layouts.success')
    @include('website.layouts.error')
    <form action="{{route('companies.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="fname">Company name</label>
                    <input required="required" name = "name" type="text" class="@error('name') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <label for="desc">Address</label>
                <input required="required" type="text" name="address" id="desc" cols="30" rows="10" class="@error('description') is-invalid @enderror form-control">
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div><br>
            <div class="col-12">
                <label for="desc">Logo</label>
                <input type="file" name="logo">
                @error('logo')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
            <button type="submit" class="btn btn-primary">add</button>
        </div>
    </form>
</div>
