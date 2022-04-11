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
                        <td><a href="remove/{{$products[$i]->cartID}}"><button type="button" class="btn btn-secondary">Remove</button></a></td>
                      </tr>
                    @endfor
                    </tbody>
                </table>

                <div class="card">
                    <h4>Total: ${{$products->sum('price')}}</h4>
                    <form action=" {{ route('order') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">PaymentMethod</label><br>
                            <input type="radio" name="paymentMethod" checked="checked" value="cash"> <span>Cash</span><br>
                            <input type="radio" name="paymentMethod" value="card"> <span>Card</span>
                        </div>
                        <button type="submit" class="btn btn-primary">Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
