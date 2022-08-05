@extends('website.master')
<div class="content_wrapper" style="padding: 20px">
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            @include('website.layouts.success')
            @include('website.layouts.error')

            <div class="mt-4">
                <a href="{{route('employees.create')}}">
                    <button type="button" class="button x-small btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal">
                        Add Employee
                    </button>
                </a>
            </div>

            <br><br>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true" style="margin-top: 40px">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add new Employee</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <section class="table_area">
        <div class="panel">
            <div class="panel_header">
                <div class="panel_title">
                    <span>All Employees</span></div>
            </div>
            <div class="panel_body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>Company</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1 ?>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$employee->name}}</td>
                                <td>{{$employee->email}}</td>
                                <td><img src="{{ asset($employee->logo) }}" style="width: 50px;height: 50px"></td>
                                <td>{{$employee->company->name}}</td>
                                <td>
                                    <a href="{{route('employees.edit', $employee->id)}}">
                                        <button type="button" class="btn btn-info">Edit</button>
                                    </a>

                                    <form action="{{route('employees.destroy',$employee->id)}}"
                                          method="post">
                                        {{ method_field('Delete') }}
                                        @csrf
                                        <input id="id" type="hidden" name="employee_id" class="form-control"
                                               value="{{ $employee->id }}">
                                        <button type="submit"
                                                class="btn btn-danger">delete
                                        </button>
                                    </form>

                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- /table -->

    </section>


</div><!--/ content wrapper -->


</body>
</html>
