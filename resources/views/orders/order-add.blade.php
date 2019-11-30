@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-12">
            <h2>Free home delivery order for {{$resto->name}}</h2>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <order-group :resto-id="{{$resto->id}}"></order-group>
        </div>
    </div>
</div>
@endsection
