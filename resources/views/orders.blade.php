@extends('layouts.app')

<?php

?>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @for ($i = 0; $i < $orders->count(); $i++)
                    <div class="card-header">
                        <h5 class="mb-0">

                            Order #{{$i+1}}    ----      {{$orders[$i]->created_at}}

                        </h5>
                    </div>
                    <div>
                        @foreach ($itemsInOrder=App\Http\Controllers\OrdersController::getOrdersByCreatedAt($orders[$i]->created_at) as $item)
                            <div>
                                <div class="card-body">
                                    <table class="table" >
                                        <tbody>
                                          <tr>
                                            <th> {{$item->name}}</td>
                                            <td> ${{$item->price}}</td>
                                            <td>{{$item->status}}</td>
                                          </tr>
                                        </tbody>
                                    </table>
                                </div>
                          </div>


                        @endforeach
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>
@endsection
