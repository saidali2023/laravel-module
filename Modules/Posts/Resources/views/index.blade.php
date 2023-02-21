
<div class='table-responsive'>
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
</div>
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
