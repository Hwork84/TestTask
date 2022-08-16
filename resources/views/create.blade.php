@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center font-weight-bold">
                        Create
                    </div>
                    @include('publication')
                </div>
            </div>
        </div>
    </div>
@endsection
