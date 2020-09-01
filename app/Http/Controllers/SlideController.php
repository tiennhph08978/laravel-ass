<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    //
    public function getList(){
        $slides = Slide::all();
        return view('admin.slide.list', ['slides'=>$slides]);
    }

    public function getAdd(){
        return view('admin.slide.add');
    }

    public function postAdd(Request $request){
        $slide = new Slide();
        $image = $request->file('image');
        // dd($image);
        $namewithextension = $image->getClientOriginalName(); //Name with extension 'filename.jpg'
        $fileName = explode('.', $namewithextension)[0]; // Filename 'filename'
        // var_dump($fileName);
        $name = $fileName . '-' . time() .'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/upload/avatar');

    
        $image->move($destinationPath, $name);
        $slide->image = $name;

        $slide->save();
        return redirect()->route('Slide.list')->with('thongbao', 'them thanh cong');
    }

    public function getEdit($id){
        $slide = Slide::find($id);
        return view('admin/slide/edit',['slide'=>$slide]);
    }

    public function postEdit(Request $request,$id){
        $slide = Slide::find($id);
        if($request->hasFile('image')){
        $image = $request->file('image');
        // dd($image);
        $namewithextension = $image->getClientOriginalName(); //Name with extension 'filename.jpg'
        $fileName = explode('.', $namewithextension)[0]; // Filename 'filename'
        // var_dump($fileName);
        $name = $fileName . '-' . time() .'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/upload/avatar');

    
        $image->move($destinationPath, $name);
        $slide->image = $name;
        }
        $slide->update();
        
        return redirect()->route('Slide.list')->with('thongbao', 'sua thanh cong');
    }
    public function getDelete($id){
        Slide::destroy($id);
        return back()->with('thongbano', 'xoa thanh cong');
    }
}
