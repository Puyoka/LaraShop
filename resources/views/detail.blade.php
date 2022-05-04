@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card col-md-4 box-shadow mx-auto text-center" style="width: 18rem;">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">{{$product->name}}</h4>
                    </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">{{$product->price}}<small class="text-muted">$$$</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                            <li>Quantity: {{$product->quantity}}</li>
                            <li>Category: {{$product->category}}</li>
                            <li class="mb-0 text-muted">Manufacturer: {{$product->manufacturer}}</li>
                            </ul>
                        </div>
                        <form action="/addToShopcart" method="POST">
                            @csrf
                            <input type="hidden" name="productID" value="{{$product->id}}">
                            <button  onclick="{{ route('addToShopcart') }}" class="btn btn-lg btn-block btn-primary">Add to cart</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
