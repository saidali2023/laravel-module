@extends('layout.admin_main')
@section('content') 

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blogs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <p><a href="{{ route('app.blogs.create') }}">Add Blog</a> </p>

                    <table>
                        <tr>
                            <td>Name</td>
                            <td>Action</td>
                        </tr>
                        @foreach($blogs as $blog)
                            <tr>
                                <td>{{ $blog->name }}</td>
                                <td>
                                    <a href="{{ route('app.blogs.edit', $blog->id) }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection