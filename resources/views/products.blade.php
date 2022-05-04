@extends('layouts.app')

@section('content')


<div class="container">
    <div>
        <form action="/search"  class="navbar-form navbar-left">
            <div class="form-group">
                <input type="text" name="nameToSearch" width = 800px placeholder="Search">
                <button type="submit" onclick="{{ route('search') }}" class="btn btn-light">Submit</button>
            </div>
        </form>
    </div>
    <div class="wrap-right">
        <select class="use-chosen" name="order" onclick="{{ route('orderby') }}">
            <option value="0" selected>Name Ascending</option>
            <option value="1">Name Descending</option>
            <option value="2">Price Ascending</option>
            <option value="3">Price Descending</option>
        </select>
    </div>



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

