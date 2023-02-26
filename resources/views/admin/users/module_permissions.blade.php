@extends('layout.admin_main')
@section('content') 
<div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
          <!-- <h3 class="content-header-title mb-0 d-inline-block">Responsive Datatable</h3> -->
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
            @foreach ($allmodule as $_item)
              <?php 
                $checki_user_module = App\Models\UserModule::where("user_id" , $user->id)->
                                          where("module_id" , $_item->id)->first();
              ?>
            <div class="col-md-4 col-sm-12">
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <h4 class="mb-1"> {{$_item->name}}</h4>
                    <p>This is the most basic example of ratings.</p>
                    <div class="form-group text-center">
                      <form action="{{route('module_permissions')}}" method="POST" name="le_form" >
                                @csrf
                            <input type="hidden" name="user_id" class="form-control" value="{{$user->id}}">
                            
                        <input type="hidden" name="module_id" class="form-control" value="{{$_item->id}}">
                        <input type="hidden" name="name" class="form-control" value="{{$_item->name}}">
                        <center>
                          @if($checki_user_module)
                            <button type="submit" class="btn btn-success mr-2 mb-1 float-center select-node" id="btn-select-node" >un install</button>
                          @else
                            <button type="submit" class="btn btn-success mr-2 mb-1 float-center select-node" id="btn-select-node" style="background-color: #22a0f2 !important;" >
                                install
                            </button>
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

@endsection