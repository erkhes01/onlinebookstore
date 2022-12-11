<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\mod_members;
use App\Models\mod_sellers;
use App\Models\mod_managers;
use App\Models\mod_books;
use App\Models\mod_credit_cards;
use App\Models\mod_orders;
use App\Models\mod_rents;
use Session;


class MyController extends Controller
{
    //
    public function books()
    {
        $books = mod_books::all();
        // return view('books', ['books'=>$books]);
        return view('books', compact('books'));
    }

    public function book($isbn)
    {
        $book = mod_books::where('isbn', $isbn)->first();
        return view('book', compact('book'));
    }

    public function loginForm(){
        return view('loginform');
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $userpass = $request->userpass;
        $usertype = $request->usertype;
        try
        {   
            if($usertype == 'member'){
                $user = mod_members::where('email', $username)->first();
            }
            else if($usertype == 'manager'){
                $user = mod_managers::where('email', $username)->first();
            }
            else if($usertype == 'seller'){
                $user = mod_sellers::where('email', $username)->first();
                // $user = DB::table('sellers')->where('email', $username)->first();
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }

        if($user->password == md5($userpass))
            {
                "<script>alert('Амжилттай нэвтэрлээ!')</script>";
                Session::put('user', $user->type);
                Session::put('id', $user->id); 
                return redirect('books');
            }
            else
            {
                echo "Бүртгэгдээгүй хэрэглэгч байна!";
            }
        
    }

    public function signup(Request $request){
        if($request->type == 'manager'){
            $manager = new mod_managers;
            $manager->email = $request->email;
            $manager->password = md5($request->password);
            $manager->type = $request->type;
            $manager->save();
            return redirect('signupform')->with('alert', 'Хэрэглэгч амжилттай бүртгэгдлээ!');
        }
        else if($request->type == 'seller'){
            $seller = new mod_sellers;
            $seller->email = $request->email;
            $seller->password = md5($request->password);
            $seller->type = $request->type;
            $seller->save();
            return redirect('signupform')->with('alert', 'Хэрэглэгч амжилттай бүртгэгдлээ!');
        }
        else{
            $member = new mod_members;
            $member->name = $request->firstname.$request->lastname;
            $member->addr = $request->addr;
            $member->rd = $request->rd;
            $member->addr = $request->addr;
            $member->mobile = $request->mobile;
            $member->email = $request->email;
            $member->confirmed = 0;
            $member->password = md5($request->password);
            $member->type = $request->type;
            $creditcard = new mod_credit_cards;
            $creditcard->email = $request->email;
            $creditcard->number = $request->creditcardnumber;
            $creditcard->pin = $request->creditcardpin;
            $creditcard->balance = 100000;
            Mail::to($request->email)->send(new Verification)->with(['id', $member->id]);
            $member->save();
            $creditcard->save();
            return redirect('signupform')->with('alert', 'Хэрэглэгч амжилттай бүртгэгдлээ!');
        }
    }

    public function confirmed(){

    }

    public function registerBook(Request $request){
        //update book
        if(null != $request->id){
            $book = mod_books::where('id', $request->id)->first();
            $book->title = $request->title;
                    $book->author = $request->author;
                    $book->isbn = $request->isbn;
                    $book->description = $request->description;
                    if($request->file('picture')){
                        $file= $request->file('picture');
                        $filename= $request->isbn.$file->getClientOriginalName();
                        $file-> move(public_path('public/Image'), $filename);
                        $book->picture= $filename;
                    }
                    $book->published = $request->published;
                    $book->type = $request->type;
                    if($request->file('bookfile')){
                        $file= $request->file('bookfile');
                        $filename= $request->isbn.$file->getClientOriginalName();
                        $file-> move(public_path('public/Ebook'), $filename);
                        $book->file= $filename;
                    }
                    $book->quantity = $request->quantity;
                    $book->price = $request->price;
                    $book->pages = $request->pages;
                    $book->rating = $request->rating;
                    $book->save();
                    return redirect('books');
        }
        //insert book
        else{
            try
            {   
                if(mod_books::where('isbn', $request->isbn)->exists())
                {
                    echo "Таны оруулсан ISBN-тэй ном бүртгэлтэй байна!";
                }
                else
                {
                    $book = new mod_books;
                    $book->title = $request->title;
                    $book->author = $request->author;
                    $book->isbn = $request->isbn;
                    $book->description = $request->description;
                    if($request->file('picture')){
                        $file= $request->file('picture');
                        $filename= $request->isbn.$file->getClientOriginalName();
                        $file-> move(public_path('public/Image'), $filename);
                        $book->picture= $filename;
                    }
                    $book->published = $request->published;
                    $book->type = $request->type;
                    if($request->file('bookfile')){
                        $file= $request->file('bookfile');
                        $filename= $request->isbn.$file->getClientOriginalName();
                        $file-> move(public_path('public/Ebook'), $filename);
                        $book->file= $filename;
                    }
                    $book->quantity = $request->quantity;
                    $book->price = $request->price;
                    $book->pages = $request->pages;
                    $book->rating = $request->rating;
                    $book->save();
                    return redirect('books');
                    // DB::insert('insert into books (title, author, isbn, description, picture, published, type, category, quantity, price)
                    // values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$title, $author, $isbn, $description, $picture, $published, $type, $category, $quantity, $price]);;
                }
            }
            catch(Exception $e)
            {
                echo 'Message: ' .$e->getMessage();
            }
        }
        
    }

    public function editBook($id){
        $book = mod_books::where('id', $id)->first();
        return redirect('bookform')->with(['book' => $book]);
    }

    public function generateUniqueCode($ids)
    {

    $characters = '123456789';
    $charactersNumber = strlen($characters);
    $codeLength = 6;
    $code = '';

    while (strlen($code) < 6) {
        $position = rand(0, $charactersNumber - 1);
        $character = $characters[$position];
        $code = $code.$character;
    }
    // foreach($ids as $id){
    //     if ($code = $id) {
    //         $this->generateUniqueCode($id);
    //     }
    // }
    return $code;
    }

    public function createorder($book, $type){
        $existingorderids = mod_orders::select('id')->get();
        $orderid = $this->generateUniqueCode($existingorderids);
        $order = new mod_orders;
        $order->id = $orderid;
        $order->isbn = $book->isbn;
        $order->type = $type;
        $order->member = Session::get('id');
        if($type == "download"){
            $order->status = "Төлөх";
        }
        else{
            $order->status = "Зөвшөөрөл хүлээж байна...";
            $order->end_at = date('Y-m-d H:i:s', strtotime('+1 day'));
        }
        $order->save();
        return $orderid;
    }

    public function download($isbn){
        $book = mod_books::where('isbn', $isbn)->first();
        $orderid = $this->createorder($book, 'download');
        $member = mod_members::where('id', Session::get('id'))->first();
        $credit = mod_credit_cards::where('email', $member->email)->first();
        return redirect(url('payment').'/'.$orderid);
    }

    public function purchase($isbn){
        $book = mod_books::where('isbn', $isbn)->first();
        $orderid = $this->createorder($book, 'purchase');
        return redirect('orderhistory');
    }

    public function rent($isbn){
        $book = mod_books::where('isbn', $isbn)->first();
        $orderid = $this->createorder($book, 'rent');
        return redirect('orderhistory');
    }

    public function payment($orderid){
        $member = mod_members::where('id', Session::get('id'))->first();
        $credit = mod_credit_cards::where('email', $member->email)->first();
        return view('payment', ['credit' => $credit], ['orderid' => $orderid]);
    }

    public function pay($orderid, Request $request){
        $credit = mod_credit_cards::where('number', $request->number)->first();
        $order = mod_orders::where('id', $orderid)->first();
        $book = mod_books::where('isbn', $order->isbn)->first();
        $rent = mod_rents::where('orderid', $orderid)->first();
        if($credit->pin == md5($request->pass)){
            if($order->type == "rent" && $rent->orderid == null){
                if($credit->balance >= 5000){
                    $rent = new mod_rents;
                    $rent->orderid = $orderid;
                    $end_at = date('Y-m-d H:i:s', strtotime('+7 day'));
                    $rent->end_at = $end_at;
                    $rent->if_extended = 0;
                    $rent->fine = 0;
                    $credit->balance = $credit->balance - 5000;
                    $order->status = "Төлсөн";
                    $order->end_at = null;
                    $order->rent_end_at = $end_at;
                    $rent->save();
                    $credit->save();
                    $order->save();
                    $book->quantity = $book->quantity - 1;
                    $book->save();
                    return redirect("orderhistory");
                }
                else{
                    echo "Үлдэгдэл хүрэлцэхгүй байна";
                }
            }
            elseif($order->type == "rent" && $rent->orderid != null){
                $rent->if_extended == 1;
                $rent->end_at = date($rent->end_at, strtotime('+7 day'));
                $order->rent_end_at = $rent->end_at;
                $order->save();
                $rent->save();
                return redirect('orderhistory');
            }
            else{
                if($credit->balance >= $book->price){
                    $credit->balance = $credit->balance - $book->price;
                    $order->status = "Төлсөн";
                    $order->end_at = null;
                    $credit->save();
                    $order->save();
                    if($order->type == "download"){
                        return redirect(url("result").'/'.$order->id);
                    }
                    else if($order->type == "purchase"){
                        $book->quantity = $book->quantity - 1;
                        if($book->quantity == 0 && $book->type = "Хэвлэмэл + Электрон"){
                            $book->type = "Электрон";
                        }
                        $book->save();
                        return redirect("orderhistory");
                    }
                }
                else{
                    echo "Үлдэгдэл хүрэлцэхгүй байна";
                }
            }
        }
        else{
            echo "Кардны нууц үг буруу байна";
        }
    }

    public function payorder(){
        $member = mod_members::where('id', Session::get('id'))->first();
        $credit = mod_credit_cards::where('email', $member->email)->first();
        return redirect('payment')->with(['book' => $book, 'number' => $credit]);
    }

    public function orderhistory(){
        $usertype = Session::get('user');
        if($usertype == 'member'){
            $orders = mod_orders::where('member', Session::get('id'))->get();
        }
        else{
            $orders = mod_orders::all();
        }
        foreach($orders as $order){
            if($order->type != "download" && $order->end_at != null && $order->end_at < date('Y-m-d H:i:s')){
                $order->status = "Цуцлагдсан";
                $order->save();
            }
        }
        return view('orderhistory', compact('orders'));
    }

    public function result($orderid){
        $order = mod_orders::where('id', $orderid)->first();
        if($order->type == "download"){
            $book = mod_books::where('isbn', $order->isbn)->first();
            $bookfile = $book->file;
            $alert = "Та электрон ном худалдаж авсан байна. Доорх линкээр татаж авна уу.";
            return view('result', compact('bookfile', 'alert'));
        }
        else if($order->type == "rent"){
            $rent = mod_rents::where('orderid', $orderid)->first();
            if($rent->if_extended == 1){
                $alert = "Та энэхүү түрээсний хугацааг хэдийнээ сунгасан байна.";
                return view('result', compact('bookfile', 'alert'));
            }
            else{
                $order->status = "Сунгалт хүссэн...";
                $order->save();
                return redirect('orderhistory');
            }
        }
    }

    public function accept($orderid){
        $order = mod_orders::where('id', $orderid)->first();
        $order->status = "Төлөх";
        $order->seller = Session::get('id');
        $order->save();
        return redirect('orderhistory');
    }

    public function extend($orderid){
        $order = mod_orders::where('id', $orderid)->first();
        $order->status = "Төлөх";
        $order->save();
        return redirect('orderhistory');
    }

    public function outofstock($isbn){
        $book = mod_orders::where('isbn', $isbn)->first();
        $book->type = "Электрон";
        $book->save();
        return redirect('books');
    }
}