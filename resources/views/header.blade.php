<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>
    @yield('style')
</head>
<body>
    <div>
        <table>
            <tr>
                <td>
                    <livewire:search-dropdown>
                </td>
                <td>
                    <button type="button" onclick="">Хайх</button>
                </td>
                <td>
                    <?php
                        if (!Session::has('user'))
                        {
                            echo "<button type='button' onclick='location.href=\"http://127.0.0.1:8000/loginform\"'>Нэвтрэх</button>";
                        }
                        else{
                            echo "<button type='button' onclick='location.href=\"http://127.0.0.1:8000/logout\"'>Гарах</button>";
                            if(str_contains(Session::get('user'), "seller")){
                            echo "<button type='button' onclick='location.href=\"http://127.0.0.1:8000/signupform\"'>Хэрэглэгч бүртгэх</button>";
                            echo "<button type='button' onclick='location.href=\"http://127.0.0.1:8000/orderhistory\"'>Захиалгын түүх</button>";
                            }
                            else if(str_contains(Session::get('user'), "manager")){
                                echo "<button type='button' onclick='location.href=\"http://127.0.0.1:8000/bookform\"'>Ном бүртгэх</button>";
                            }
                            else if(str_contains(Session::get('user'), "member")){
                                echo "<button type='button' onclick='location.href=\"http://127.0.0.1:8000/orderhistory\"'>Захиалгын түүх</button>";
                            }
                        }
                    ?>
                </td>
                
                
            </tr>
        </table>
    </div>
    <div>
        @yield('content')
        <livewire:scripts>
    </div>
</body>
</html>