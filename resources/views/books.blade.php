<?php
echo '<script>
  function warning(a){
    var y = a;
    var x = document.getElementById("warning");
    if(y == 0 || y == null){
      x.style.display = "block";
    }
    else{
      x.style.display = "none";
    }
  }
</script>';
?>

@extends('header')

@section('title')
Номны жагсаалт
@endsection

@section('style')
<style>
    .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
    margin: auto;
    text-align: center;
    font-family: arial;
  }
  
  .price {
    color: grey;
    font-size: 22px;
  }
  
  .card button {
    border: none;
    outline: 0;
    padding: 12px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
  }
  
  .card button:hover {
    opacity: 0.7;
  }

  .warning {
    color: red;
  }
</style>

@endsection

@section('content')
<h1>Books</h1>
@foreach($books as $book)
  @if($book->type == "Хэвлэмэл" && $book->quantity == 0 && Session::get('user') == 'member')
    @continue
  @else
    <body onload="warning({{$book->quantity}})">
      <div class="card">
        <img src="{{url('public/Image/'.$book->picture)}}" style="width:100%">
        <h1>{{$book->title}}</h1>
        <p class="price">{{$book->price}}₮</p>
        <p>{{$book->rating}} од</p>
        <p>{{$book->type}}</p>
        <p><button class="ard button" onclick='window.location.href="{{url('book')}}/{{$book->isbn}}"'>Дэлгэрэнгүй</button></p>
      </div>
    </body>
  @endif
@endforeach
@endsection