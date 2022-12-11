<?php
echo '<script>
    function hoosol(){
    var x = document.getElementById("member");
    var y = document.getElementById("manager");
    var z = document.getElementById("seller");
    x.style.display = "none";
    y.style.display = "none";
    z.style.display = "none";
    }
</script>';

echo '<script>
function myFunction(type) {
    var a = type;
    var x = document.getElementById("member");
    var y = document.getElementById("manager");
    var z = document.getElementById("seller");
    var a1 = document.getElementById("type1");
    var a2 = document.getElementById("type2");
    var a3 = document.getElementById("type3");
    a1.value = a;
    a2.value = a;
    a3.value = a;
    if(a == "member"){
        x.style.display = "block";
        y.style.display = "none";
        z.style.display = "none";
        
    }
    else if(a == "manager"){
        x.style.display = "none";
        y.style.display = "block";
        z.style.display = "none";
        
    }
    else if(a == "seller"){
        x.style.display = "none";
        y.style.display = "none";
        z.style.display = "block";
        
    }
    else if(a==""){
        x.style.display = "none";
        y.style.display = "none";
        z.style.display = "none";
    }
  }
</script>';

echo "<script>
if({{Session::has('alert')}}){
  alert({{Session::get('alert')}});
}
</script>";
?>
@extends('header')

@section('title')
Хэрэглэгч бүртгэх
@endsection

@section('style')
@endsection

@section('content')
<h1>Хэрэглэгч бүртгэх</h1>
<body onload="hoosol()">
    <select onchange="myFunction(this.value)" required>
        <option value="">--Хэрэглэгчийн төрөл--</option>
        <option value="member">Гишүүн</option>
        <option value="manager">Менежер</option>
        <option value="seller">Худалдагч</option>
    </select>
    <div id="member">
    <form action="{{url('signup')}}" method="post">
    {{ csrf_field() }}
    <table>
        <tr>
            <td>Овог</td>
            <td><input type="text" name="lastname"></td>
        </tr>
        <tr>
            <td>Нэр</td>
            <td><input type="text" name="firstname"></td>
        </tr>
        <tr>
            <td>Хаяг</td>
            <td><input type="text" name="addr"></td>
        </tr>
        <tr>
            <td>Регистрийн дугаар</td>
            <td><input type="text" name="rd"></td>
        </tr>
        <tr>
            <td>Утасны дугаар</td>
            <td><input type="text" name="mobile"></td>
        </tr>
        <tr>
            <td>И-мэйл</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Нууц үг</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td>Кредит картны дугаар</td>
            <td><input type="text" name="creditcardnumber"></td>
        </tr>
        <tr>
            <td>Кредит картны нууц үг</td>
            <td><input type="password" name="creditcardpin"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="type" id="type1"></td>
        </tr>
    </table>
    <input type="submit" value="Save">
    </form>
    </div>

    <div id="manager">
    <form action="{{url('signup')}}" method="post">
    {{ csrf_field() }}
    <table>
        <tr>
            <td>И-мэйл</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Нууц үг</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="type" id="type2"></td>
        </tr>
    </table>
    <input type="submit" value="Save">
    </form>
    </div>

    <div id="seller">
    <form action="{{url('signup')}}" method="post">
    {{ csrf_field() }}
    <table>
        <tr>
            <td>И-мэйл</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Нууц үг</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="type" id="type3"></td>
        </tr>
    </table>
    <input type="submit" value="Save">
    </form>
    </div>
</body>
@endsection