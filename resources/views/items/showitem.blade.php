@extends('layout')

@section('content')
    <div class="jumbotron">
        <h1>{{  $item->name    }}</h1>
        <p>{{   $item->description   }}</p>

    </div>
@stop