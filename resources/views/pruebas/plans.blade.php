

@extends('layouts.appsubcripcion')
@section('content')
   <div>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Subscripcion</h1>
        <p class="lead">Escoja uno de nuestros planes para tener acceso a todas las funciones</p>
      </div>
      
    <div class="container">
        <div class="card-deck mb-3 text-center">
          @foreach($plans as $plan)
          <div class="card mb-4 box-shadow">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal">{{$plan->name}}</h4>
            </div>
            <div class="card-body">
              <h1 class="card-title pricing-card-title">{{$plan->metadata->precio}}<small class="text-muted"> /mes</small></h1>
              <ul class="list-unstyled mt-3 mb-4">
                <li>{{$plan->metadata->li1}}</li>
                <li>{{$plan->metadata->li2}}</li>
              </ul>
              <form action="{{route('plan')}}" method="POST" >
                  @csrf
                  <input name="plan" class="form-control" id="plan" value="{{$plan->name}}" hidden="true">
                  <input name="precio" class="form-control" id="precio" value="{{$plan->default_price}}" hidden="true">
                  <button type="submit" class="btn btn-dark">Subscribirse</button>
                </form>
            </div>
          </div>
          @endforeach
        </div>
      </div>
   </div>
@endsection
