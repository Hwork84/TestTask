@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    Publication
                                </div>
                                <div class="col">
                                    @if(Auth::user()->is_admin)
                                        <a class="btn btn-primary" style="float: right;" href="{{ route('show_create') }}">Create</a>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success"  role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(!empty($posts))

                            @foreach ($posts as $post)
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 col-md-8" id="{{ $post->id }}">
                                            <a href="{{ route('view_post',$post->id) }}">{{ $post->publication_title }}</a>
                                        </div>
                                        @if(Auth::user()->is_admin)

                                            <div class="col-6 col-md-4 " style="display: flex; justify-content: flex-end">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item" href="{{ route('edit_post',$post->id) }}">Edit</a>
                                                        <a class="dropdown-item" href="{{ route('delete_post',$post->id) }}">Delete</a>
                                                    </div>

                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
