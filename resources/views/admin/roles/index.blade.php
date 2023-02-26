@extends('layout.admin_main')
@section('content') 
     <!-- KeyTable integration table -->

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">المستخدمين</h3><br>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                
                <li class="breadcrumb-item active">المستخدمين
                </li>
              </ol> 
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
          <div class="dropdown float-md-right">
            @can('اضافة صلاحية')
                <a href="{{ route('roles.create') }}" class="btn btn-primary float-right mt-2">أضافة صلاحية</a>
            @endcan
          </div>
        </div>
        @if (session()->has('Add'))
                                <script>
                                    window.onload = function() {
                                        notif({
                                            msg: " تم اضافة الصلاحية بنجاح",
                                            type: "success"
                                        });
                                    }

                                </script>
                            @endif

                            @if (session()->has('edit'))
                                <script>
                                    window.onload = function() {
                                        notif({
                                            msg: " تم تحديث بيانات الصلاحية بنجاح",
                                            type: "success"
                                        });
                                    }

                                </script>
                            @endif

                            @if (session()->has('delete'))
                                <script>
                                    window.onload = function() {
                                        notif({
                                            msg: " تم حذف الصلاحية بنجاح",
                                            type: "error"
                                        });
                                    }

                                </script>
                            @endif
    </div>

        <section id="keytable">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">KeyTable integration</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <!-- <table class="table table-bordered table-striped table-hover js-basic-example dataTable"> -->
                    @if ($message = Session::get('success'))
                <div class="alert alert-success">
                  <p>{{ $message }}</p>
                </div>
                @endif
                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0" id="kt_table_1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $key => $role)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                                    @can('update role')
                                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                    @endcan
                                    @can('delete role')
                                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


          

        </section>
       
     <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
  


@endsection