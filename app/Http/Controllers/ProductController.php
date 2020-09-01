<?php

namespace App\Http\Controllers;

use DB;
use App\Product;
use App\Type_product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductRequestUpdate;

 
class ProductController extends Controller
{
    //
    public function getList(){
        $data['productlist'] = DB::table('products')->join('type_products','products.id_type', '=', 'type_products.id')
        ->orderBy('pro_id','desc')->get();
        return view('admin.product.list', $data);
    }

    public function getAdd(){
        $data['catelist'] = Type_product::all(); 
        return view('admin.product.add', $data);
    }

    public function postAdd(ProductRequest $request){
        $product = new Product();
        $product->name = $request->name;
        $product->id_type = $request->id_type;
        // dd($product->id_type);
        $product->description = $request->description;
        // $product->image = $filename;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->new = $request->new;

        $image = $request->file('image');
        $namewithextension = $image->getClientOriginalName(); //Name with extension 'filename.jpg'
        $fileName = explode('.', $namewithextension)[0]; // Filename 'filename'
        // var_dump($fileName);
        $name = $fileName . '-' . time() .'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/upload/avatar');

    
        $image->move($destinationPath, $name);
        $product->image = $name;


        $product->save();
        // $request->image->storeAs('avatar',$filename);
        return redirect()->route('Product.list')->with('thongbao', 'them thanh cong');

    }

    public function getEdit($pro_id){
        $product = Product::find($pro_id);
        $data['catelist'] = Type_product::all(); 

        return view('admin.product.edit', ['pro'=>$product], $data);
    }

    public function postEdit(ProductRequestUpdate $request,$pro_id){
        $product = Product::find($pro_id);
        $product->name = $request->name;
        $product->id_type = $request->id_type;
        // dd($product->id_type);
        $product->description = $request->description;
        // $product->image = $filename;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->new = $request->new;
        if ($request->hasFile('image')) {
    
        $image = $request->file('image');
        $namewithextension = $image->getClientOriginalName(); //Name with extension 'filename.jpg'
        // var_dump('$namewithextension');
        $fileName = explode('.', $namewithextension)[0]; // Filename 'filename'

        $name = $fileName . '-' . time() .'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/upload/avatar');

    
        $image->move($destinationPath, $name);
        $product->image = $name;
        }
        // dd(request()->all());
        $product->update();
        return redirect('admin/product/list')->with('thongbao', 'sua thanh cong');
    }

    public function getDelete($pro_id){
        Product::destroy($pro_id);
        return back()->with('thongbao', 'xoa thanh cong');
    }

    public function getID($id){
        $pro = Product::find($id);
        return view('index',  ['pro'=>$pro]);
    }
}
