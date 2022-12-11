<?php
echo '<script>
function myFunction(type) {
    var a = type;
    var x = document.getElementById("purchase");
    var y = document.getElementById("download");
    var z = document.getElementById("rent");
    if(a == "Электрон"){
        x.style.display = "none";
        y.style.display = "block";
        z.style.display = "none";
    }
    else if(a == "Хэвлэмэл"){
        x.style.display = "block";
        y.style.display = "none";
        z.style.display = "block";
    }
    else{
        x.style.display = "block";
        y.style.display = "block";
        z.style.display = "block";
    }
}
</script>';
?>

@extends('header')

@section('title')
Номны дэлгэрэнгүй
@endsection

@section('style')
@endsection

@section('content')
<h1>Номны дэлгэрэнгүй</h1>
<body onload="myFunction('{{$book->type}}')">
<table>
    <tr>
        <img src="{{url('public/Image/'.$book->picture)}}" style="max-width: 300px;">
    </tr>
    <tr>
        <td>
            Гарчиг: 
        </td>
        <td>
            {{$book->title}}
        </td>
    </tr>
    <tr>
        <td>
            Зохиолч:
        </td>
        <td>
            {{$book->author}}
        </td>
    </tr>
    <tr>
        <td>
            Үйлдвэрлэсэн:
        </td>
        <td>
            {{$book->published}}
        </td>
    </tr>
    <tr>
        <td>
            Төрөл:
        </td>
        <td>
            {{$book->type}}
        </td>
    </tr>
    <tr>
        <td>
            Үлдэгдэл:
        </td>
        <td>
            {{$book->quantity}}ш
        </td>
    </tr>
    <tr>
        <td>
            Үнэ:
        </td>
        <td>
            {{$book->price}}₮
        </td>
    </tr>
    <tr>
        <td>
            Хуудас:
        </td>
        <td>
            {{$book->pages}}
        </td>
    </tr>
    <tr>
        <td>
            Үнэлгээ:
        </td>
        <td>
            {{$book->rating}} од
        </td>
    </tr>
    <tr>
        <td>
            Агуулга:
        </td>
        <td>
            {{$book->description}}
        </td>
    </tr>
</table>
</body>

<?php
if(str_contains(Session::get('user'), "member")){
    echo "<button type='button' id='purchase' onclick='location.href=\"http://127.0.0.1:8000/purchase/$book->isbn\"'>Худалдаж авах</button>";
    echo "<button type='button' id='download' onclick='location.href=\"http://127.0.0.1:8000/download/$book->isbn\"'>Татаж авах</button>";
    echo "<button type='button' id='rent' onclick='location.href=\"http://127.0.0.1:8000/rent/$book->isbn\"'>Түрээслэх</button>";
}
if(str_contains(Session::get('user'), "manager")){
    echo "<button type='button' onclick='location.href=\"http://127.0.0.1:8000/bookform/$book->isbn\"'>Ном засварлах</button>";
}
?>
@endsection