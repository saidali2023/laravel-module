@extends('layout.admin_main')
@section('content') 

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('app.blogs.update', $blog->id) }}" method="post">
                    @csrf
                    @method('patch')

                        <input class="border" name="name" value="{{ old('name', $blog->name) }}" />
                        <button>{{ __('Submit') }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection