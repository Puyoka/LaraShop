@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-2 text-center">
        @foreach ($products as &$product)
        <div class="card col-md-4 box-shadow">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal"><a  href="http://127.0.0.1:8000/product/{{$product->id}}" style="text-decoration: none">{{$product->name}}</a></h4>
        </div>
        <div class="card-body">
            <h1 class="card-title pricing-card-title">{{$product->price}}<small class="text-muted">$$$</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
            </ul>
            <form action="/addToShopcart" method="POST">
                @csrf
                <input type="hidden" name="productID" value="{{$product->id}}">
                <button  onclick="{{ route('addToShopcart') }}" class="btn btn-lg btn-block btn-primary">Add to cart</button>
            </form>
        </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

