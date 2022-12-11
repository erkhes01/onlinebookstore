@extends('header')

@section('title')
Төлбөр төлөх
@endsection

@section('style')
@endsection

@section('content')
<h1>Төлбөр төлөх</h1>
<body>
    <form action="{{url('pay')}}/{{$orderid}}" method="post">
    {{ csrf_field() }}
        <input type="text" name="number" value="{{$credit->number}}" readonly>
        <input type="password" name="pass">
        <input type="submit" value="Enter">
    </form>
</body>
@endsection