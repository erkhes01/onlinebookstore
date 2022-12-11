@extends('header')

@section('title')
Захиалгын түүх
@endsection

@section('style')
@endsection

<?php $usertype = Session::get('user'); ?>

@section('content')
<body>
    <table border="1">
            <tr>
                <td>
                    Захиалгын дугаар
                </td>
                <td>
                    Номны ISBN
                </td>
                <td>
                    Номны төрөл
                </td>
                @if($usertype == "seller")
                <td>
                    Захиалагч гишүүн
                </td>
                @endif
                <td>
                    Зөвшөөрсөн худалдагч
                </td>
                <td>
                    Төлөв
                </td>
                <td>
                    Link
                </td>
                <td>
                    Захиалга үүссэн огноо
                </td>
                <td>
                    Захиалга дуусах огноо
                </td>
                <td>
                    Түрээс дуусах огноо
                </td>
            </tr>
        @foreach($orders as $order)
            <tr>
                <td>
                    {{$order->id}}
                </td>
                <td>
                    {{$order->isbn}}
                </td>
                <td>
                    {{$order->type}}
                </td>
                @if($usertype == "seller")
                <td>
                    {{$order->member}}
                </td>
                @endif
                <td>
                    {{$order->seller}}
                </td>
                <td>
                    @if($usertype == "seller")
                        {{$order->status}}
                    @elseif($usertype == "member")
                        @if($order->status == "Төлөх")
                        <a href="{{url('payment')}}/{{$order->id}}">Төлөх</a>
                        @else
                        {{$order->status}}
                        @endif
                    @endif
                </td>
                <td>
                    @if($usertype == "seller")
                        @if($order->status == "Зөвшөөрөл хүлээж байна...")
                        <?php echo "<button type='button' onclick='location.href=\"http://127.0.0.1:8000/accept/$order->id\"'>Зөвшөөрөх</button>"; ?>
                        @elseif($order->status == "Сунгалт хүссэн...")
                        <?php echo "<button type='button' onclick='location.href=\"http://127.0.0.1:8000/extend/$order->id\"'>Зөвшөөрөх</button>"; ?>
                        @endif
                    @elseif($usertype == "member")
                        @if($order->status == "Төлсөн")
                            @if($order->type == "download")
                            <?php echo "<button type='button' onclick='location.href=\"http://127.0.0.1:8000/result/$order->id\"'>Электрон ном татах</button>"; ?>
                            @elseif($order->type == "purchase")
                            Ном авсанд баяралалаа
                            @else
                            <?php echo "<button type='button' onclick='location.href=\"http://127.0.0.1:8000/result/$order->id\"'>Түрээслэх сунгалт хүсэх</button>"; ?>
                            @endif
                        @endif
                    @endif
                </td>
                <td>
                    {{$order->created_at}}
                </td>
                <td>
                    {{$order->end_at}}
                </td>
                <td>
                    {{$order->rent_end_at}}
                </td>
            </tr>
        @endforeach
    </table>
</body>
@endsection