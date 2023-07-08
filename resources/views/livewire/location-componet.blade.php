
@extends('layouts.app');

@section('content')
<div>

    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card content" style="width: 100%;">
            <div class="container-fluid text-center ">
                <div class="row align-items-center">
                    <div class="col">
                        @include('components.navbarDate')
                    </div>
                </div>
                <br>
                location
        <h1>{{ $child }}</h1>
            </div>
        </div>
    </div>
</div>
@endsection