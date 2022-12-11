@extends('header')

@section('title')
Үр дүн
@endsection

@section('style')
@endsection

@section('content')
<h1>Манайхаар үйлчлүүлсэнд баярлалаа</h1>
@if(isset($bookfile))
  <a href="{{url('public/Ebook/'.$bookfile)}}" download>
    Электрон Ном {{$bookfile}} Татах
  </a>
  <p>{{Session::get('alert')}}</p>
@else
  <p>{{Session::get('alert')}}</p>
@endif
@endsection