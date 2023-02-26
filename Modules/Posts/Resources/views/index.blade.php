@extends('layout.admin_main')
@section('content') 
<!-- <div class='table-responsive'>
    <table class='table table-striped table-hover table-bordered'>
    <tr>
        <th>Module</th>
        <th>Description</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    @foreach ($modulesl as $module) 

        @php
        $file = $module.'/module.json';
        @endphp

        @if (file_exists($file)) 

            @php
                //file contents of the module's json file
                $contents = file_get_contents($file);

                //decode the contents into an array
                $data = json_decode($contents, true);

                //encode the id
                $id = base64_encode($module);

                //array of modules to ignore that I do not allow to be disabled
                $noactions = ['Admin', 'Users'];
            @endphp

            <tr>
                <td>{{ $data['name'] }}</td>
                <td>{{ $data['description'] }}</td>
                
            </tr>

       @endif 
   @endforeach
    </table>
</div> -->
<div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <!-- <h3 class="content-header-title mb-0 d-inline-block">المستخدمين</h3><br> -->
          <div class="row breadcrumbs-top d-inline-block">
            <!-- <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                
                <li class="breadcrumb-item active">المستخدمين
                </li>
              </ol> 
            </div> -->
          </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
          <div class="dropdown float-md-right">
           
                <a  class="btn btn-primary float-right " href="{{ route('app.posts.create') }}">add </a>
           
          </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
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
                    <p class="card-text">If you are looking to emulate the UI of spreadsheet programs
                      such as Excel with DataTables, the combination of KeyTable
                      and AutoFill will take you a long way there!</p>
                    <table class="table table-striped table-bordered keytable-integration">

                      <thead>
                        <td>Name</td>

                            <td>Action</td>

                      </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->name }}</td>
                                <td>
                                    <a href="{{ route('app.posts.edit', $post->id) }}">Edit</a>
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
         



       

@endsection
    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <p><a href="{{ route('app.posts.create') }}">Add Post</a> </p>

                    <table>
                        <tr>
                            <td>Name</td>
                            <td>Action</td>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->name }}</td>
                                <td>
                                    <a href="{{ route('app.posts.edit', $post->id) }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div> -->
