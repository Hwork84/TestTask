@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center font-weight-bold">
                        Show
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="pub_title">Title Publication</label>
                            <input type="text" id="pub_title" name="pub_title" class="form-control" value="{{ $posts->publication_title ?? isset($posts) }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="pub_text">Text Publication</label>
                            <textarea name="pub_text" id="pub_text"  class="form-control"  disabled>{{$posts->publication_text ?? isset($posts)}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
