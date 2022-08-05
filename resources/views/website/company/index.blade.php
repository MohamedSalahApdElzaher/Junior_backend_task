@extends('website.master')
<div class="content_wrapper" style="padding: 20px">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                @include('website.layouts.success')
                @include('website.layouts.error')

                <div class="mt-4">
                    <a href="{{route('companies.create')}}">
                        <button type="button" class="button x-small btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add Company
                        </button>
                    </a>
                </div><br><br>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 40px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add new category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <section class="table_area" >
            <div class="panel">
                <div class="panel_header">
                    <div class="panel_title">
                        <span>All Companies</span></div>
                </div>
                <div class="panel_body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Logo</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1 ?>
                                @foreach($companies as $company)
                                   <tr>
                                       <td>{{$i++}}</td>
                                       <td>{{$company->name}}</td>
                                       <td>{{$company->address}}</td>
                                       <td><img src="{{ asset($company->logo) }}" style="width: 50px;height: 50px"></td>
                                       <td>
                                           <a href="{{route('companies.edit', $company->id)}}"><button type="button" class="btn btn-info" >Edit</button></a>

                                           <form action="{{route('companies.destroy',$company->id)}}"
                                                 method="post">
                                               {{ method_field('Delete') }}
                                               @csrf
                                               <input id="id" type="hidden" name="company_id" class="form-control"
                                                      value="{{ $company->id }}">
                                                   <button type="submit"
                                                           class="btn btn-danger">delete</button>
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
