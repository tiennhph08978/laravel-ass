<?php

namespace App\Http\Controllers;

use Session;
use App\Bill;
use App\Cart;
use App\User;
use App\Slide;
use App\Product;
use App\Customer;
use App\BillDetail;
use App\Type_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validate;

class HomeController extends Controller
{
    //
    public function index(){
        $slides = Slide::all();
        $new_product = Product::where('new',1)->paginate(4);
        $sale_product = Product::where('promotion_price','<>',0)->paginate(8);
        return view('fontend.index',compact('slides', 'new_product', 'sale_product'));
    }

    public function catePro($id){
        $pro_cate = Product::where('id_type',$id)->get();
        $cate = Type_product::all();
        $cate_pro = Type_product::where('id',$id)->first();
        return view('fontend.product_type',compact('pro_cate', 'cate', 'cate_pro'));
    }

    public function getAddCart(Request $request,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }
    
    public function getDelItemCart($id){
        $oldCart =Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
    
    public function postCheckout(Request $request){
        $cart = Session::get('cart');
        dd($cart);
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone_number = $request->phone;
        $customer->note = $request->note;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $request->payment;
        $bill->note = $request->note;
        $bill->save();

        foreach($cart['items'] as $key =>$value){
        $bill_detail = new BillDetail();
        $bill_detail->id_bill = $bill->id;
        $bill_detail->id_product = $key;
        // $bill_detail->quantity = $value['qty'];
        // $bill_detail->unit_price = $value['']
        }
        
    }
    
    public function dangki(){
        return view('fontend.dangki');
    }

    public function postdangki(Request $request){
        $request->validate([
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:15',
            'fullname'=>'required',
            're_password'=>'required|same:password'
        ],[
            'email.required'=>'Vui long nhap email',
            'email.email'=>'email khong hop le',
            'email.unique'=>'email ton tai',
            'password.required'=>'Vui long nhap password',
            're_password.required'=>'Vui long nhap password',
            're_password.same'=>'pass k trung nhau',
            'password.min'=>'nhap >6 ki tu',
            'password.max'=>'Vui long nhap <20 ktu',
            'fullname.required'=>'Vui long nhap fullname',
        ]);

        $user = new User();
        $user->full_name = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        // $user->role = $request->role;
        $user->save();
        return redirect()->back()->with('thongbao','dang ki thanh cong');
    }

    public function search(Request $request){
        $product = Product::where('name', 'like','%' .$request->key . '%')
                    ->orWhere('unit_price', $request->key)
                    ->get();
        return view('fontend.search', compact('product'));
    }
}
