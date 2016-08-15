@extends('templates/main')
@section('title')
    Due In • Task Not Found!
@endsection

@section('content')
    <h2>The task {{$id}} was not found!</h2>
    <h2>Please check if you have mis-spelt the ID.</h2>
@endsection