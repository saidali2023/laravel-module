@extends('layout.admin_main')
@section('content') 
<div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Responsive Datatable</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">DataTables</a>
                </li>
                <li class="breadcrumb-item active">Responsive Datatable
                </li>
              </ol>
            </div>
          </div>
        </div>
       
        <!-- <div class="content-header-right col-md-6 col-12">
          <div class="dropdown float-md-right">
                <a href="#"  class="btn btn-primary float-right mt-2">إضافة جديد </a>
        	</div>
        </div> -->
        @if(session()->has('message'))
                        @include('admin.includes.alerts.success')
                    @endif

                    @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>خطا</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
    </div>
    

 <section id="star-ratings">
          <div class="row match-height">
            @foreach ($mymodule as $_item)
            <div class="col-md-4 col-sm-12">
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <h4 class="mb-1"> {{$_item}}</h4>
                    <p>This is the most basic example of ratings.</p>
                    <div class="form-group text-center">
                      <form action="{{route('modulstore')}}" method="POST" name="le_form" >
                                @csrf
                          @if($_item->isEnabled())
                            <input type="hidden" name="module_status" class="form-control" value="enable">
                          @else
                            <input type="hidden" name="module_status" class="form-control" value="disable">
                          @endif     
                        <input type="hidden" name="module_name" class="form-control" value="{{$_item}}">
                        <center>
                          @if($_item->isEnabled())
                            
                            <button type="submit" class="btn btn-success mr-2 mb-1 float-center select-node" id="btn-select-node" style="background-color: #22a0f2 !important;" >disable
                                
                            </button>
                          @else
                            <button type="submit" class="btn btn-success mr-2 mb-1 float-center select-node" id="btn-select-node" >enable</button>
                          @endif
                        
                        </center>
                      </form>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
            @endforeach
          </div>
         
        </section>


        <style type="text/css">
          .btn-success {
    
            
          }
        </style>

<!-- 
 <section id="configuration">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Configuration option</h4>
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
                    <p class="card-text">The Responsive extension for DataTables can be applied to a DataTable
                      in one of two ways; with a specific class name on the table,
                      or using the DataTables initialisation options. This method
                      shows the latter, with the responsive option being set to the
                      boolean value true.
                    </p>
                    <table class="table table-striped table-bordered dataex-res-configuration">
                      <thead>
                        <tr>
                          <th>First name</th>
                          <th>Last name</th>
                          
                          <th>Age</th>
                          <th>Start date</th>
                          <th>Salary</th>

                          <th>Extn.</th>
                          <th>E-mail</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Tiger</td>
                          <td>Nixon</td>
                          
                          <td>61</td>
                          <td>2011/04/25</td>
                          <td>$320,800</td>
                          
                          <td>5421</td>
                          <td>t.nixon@datatables.net</td>
                        </tr>
                     
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
     --> 
@endsection