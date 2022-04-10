@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <table class="table" >
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                      </tr>
                    </thead>
                    <tbody>
                    @for ($i = 0; $i < $products->count(); $i++)
                      <tr>
                        <th scope="row"> {{ $i+1 }}</td>
                        <td> {{ $products[$i]->name }}</td>
                        <td>${{ $products[$i]->price }}</td>
                        <td><a href="remove/{{$products[$i]->cartID}}"><button type="button" class="btn btn-danger">Remove</button></a></td>
                      </tr>
                    @endfor
                    </tbody>
                </table>
            <h4>Total: ${{$products->sum('price')}}</h4>
            </div>
        </div>
    </div>
</div>
@endsection
