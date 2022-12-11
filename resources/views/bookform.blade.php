<?php
echo '<script>
function onLoad(){
    var x = document.getElementById("bookfile");
    x.style.display = "none";
}
</script>';

echo '<script>
function myFunction(type) {
    var a = type;
    alert(a);
    var x = document.getElementById("bookfile");
    if(a == "Электрон" || a == "Хэвлэмэл + Электрон"){
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
Номны бүртгэл
@endsection

@section('style')
@endsection

@section('content')
<?php $book = Session::get('book'); ?>
<h1>Номны бүртгэл</h1>
<body onload="onLoad()">
<form action="registerbook" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <table>
        <tr>
            <td><input type="hidden" name="id" value="<?php if(isset($book)) echo $book->id; ?>"></td>
        </tr>
        <tr>
            <td>Гарчиг</td>
            <td><input type="text" name="title" value="<?php if(isset($book)) echo $book->title; ?>"></td>
        </tr>
        <tr>
            <td>Зохиолч</td>
            <td><input type="text" name="author" value="<?php if(isset($book)) echo $book->author; ?>"></td>
        </tr>
        <tr>
            <td>ISBN</td>
            <td><input type="text" name="isbn" value="<?php if(isset($book)) echo $book->isbn; ?>"></td>
        </tr>
        <tr>
            <td>Агуулга</td>
            <td><input type="text" name="description" value="<?php if(isset($book)) echo $book->description; ?>"></td>
        </tr>
        <div class="image">
        <tr>
            <td>Зураг</td>
            <td><input type="file" name="picture" value="<?php if(isset($book)) echo $book->picture; ?>"></td>
        </tr>
        </div>
        <tr>
            <td>Огноо</td>
            <td><input type="date" name="published" value="<?php if(isset($book)) echo $book->published; ?>"></td>
        </tr>
        <tr>
            <td>Төрөл</td>
            <td>
                <select name="type" onchange="myFunction(this.value) value="<?php if(isset($book)) echo $book->type; ?>"" required>
                <option value="Хэвлэмэл">Хэвлэмэл</option>
                <option value="Электрон">Электрон</option>
                <option value="Хэвлэмэл + Электрон">Хэвлэмэл + Электрон</option>
                </select>
            </td>
        </tr>
        <div id="bookfile">
            <div class="file">
            <tr>
                <td>Электрон файл</td>
                <td><input type="file" name="bookfile" value="<?php if(isset($book)) echo $book->bookfile; ?>"></td>
            </tr>
            </div>
        </div>
        <tr>
            <td>Тоо хэмжээ</td>
            <td><input type="text" name="quantity" value="<?php if(isset($book)) echo $book->quantity; ?>"></td>
        </tr>
        <tr>
            <td>Үнэ</td>
            <td><input type="text" name="price" value="<?php if(isset($book)) echo $book->price; ?>"></td>
        </tr>
        <tr>
            <td>Хуудас</td>
            <td><input type="text" name="pages" value="<?php if(isset($book)) echo $book->pages; ?>"></td>
        </tr>
        <tr>
            <td>Үнэлгээ</td>
            <td><input type="text" name="rating" value="<?php if(isset($book)) echo $book->id; ?>"></td>
        </tr>
    </table>
    <input type="submit" value="Save">
</form>
</body>
@endsection