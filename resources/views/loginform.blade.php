@extends('header')

@section('title')
Хэрэглэгч бүртгэх
@endsection

@section('style')
@endsection

@section('content')
<h1>Log In Form</h1>
<form action='login' method='post'>
    {{ csrf_field() }}
    <table>
        <tr>
            <td>Хэрэглэгчийн нэр</td>
            <td><input type="text" name="username" required></td>
        </tr>
        <tr>
            <td>Нууц үг</td>
            <td><input type="password" name="userpass" required></td>
        </tr>
        <tr>
        <select name="usertype" required>
                <option value="member">Гишүүн</option>
                <option value="manager">Менежер</option>
                <option value="seller">Худалдагч</option>
            </select>
        </tr>
        <tr>
            <!-- <td><input type="checkbox" name="remme" value="1">Намайг сана</td> -->
            <td><input type="submit" name="Log In"></td>
        </tr>
    </table>
</form>
@endsection