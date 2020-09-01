<?php

namespace App\Http\Controllers;

use App\Type_product;
use Illuminate\Http\Request;
use App\Http\Requests\Category\CategoryRequest;
use App\Http\Requests\Category\CategoryRequestUpdate;

class CategoryController extends Controller
{
    //
    public function getList(){
        $category = Type_product::all();
        return view('admin.category.list', ['category'=>$category]);
    }

    public function getAdd(){
        // $data['catelist'] = Type_product::all();
        return view('admin.category.add');
    }

    public function postAdd(CategoryRequest $request){
        $category = new Type_product;
        $category->type_name = $request->type_name;
        $category->description = $request->description;
        $category->save();
        return redirect('admin/category/list')->with('thongbao', 'them thanh cong');
    }

    public function getEdit($id){
        $category = Type_product::find($id);
        return view('admin.category.edit', ['cate'=>$category]);
    }

    public function postEdit(CategoryRequestUpdate $request,$id){
        $category = Type_product::find($id);
        $category->type_name = $request->type_name;
        $category->description = $request->description;
        // $category->fill($request->all());
        $category->save();
        return redirect('admin/category/list')->with('thongbao', 'sua thanh cong');
    }

    public function getDelete($id){ 
        Type_product::destroy($id);
        return back()->with('thongbao', 'xoa thanh cong');
    }
}
