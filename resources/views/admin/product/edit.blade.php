@extends('layouts.index')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">San Pham
                    <small>Them</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{ session('thongbao') }}
                </div>
                @endif

                <form action="admin/product/upload/{{$pro->pro_id}}" method="POST" enctype="multipart/form-data">
                        <!-- admin/theloai/them -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>ten sp</label>
                        <input class="form-control" name="name" placeholder="nhap " value="{{ $pro->name }}" />
                    </div>
                    @error('name')
                        <p style="color:red">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                        <label>danh muc</label>
                        <select name="id_type" class="form-control">
                            @foreach($catelist as $cate)
                            <option <?php if($cate->id == $pro->id_type):?>
                                        selected
                                    <?php endif?>
                                     value="{{ $cate->id }}">{{ $cate->type_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chi tiets</label>
                        <input class="form-control" name="description" placeholder="nhap " value="{{ $pro->description }}" />
                    </div>
                    @error('description')
                        <p style="color:red">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                        <label>Gia</label>
                        <input class="form-control" name="unit_price" placeholder="nhap " value="{{$pro->unit_price}}" />
                    </div>
                    @error('unit_price')
                        <p style="color:red">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                        <label>Gia_km</label>
                        <input class="form-control" name="promotion_price" placeholder="nhap " value="{{$pro->promotion_price}}" />
                    </div>
                    @error('promotion_price')
                        <p style="color:red">{{$message}}</p>
                    @enderror
                    <div class="form-group" >
                    <label>Ảnh sản phẩm</label>
                    <input id="image" type="file" name="image" value=""  onchange="changeImg(this)">
                    <img id="avatar" class="thumbnail" width="300px" src='{{ asset("/upload/avatar/$pro->image") }}'>
                   </div>
                   @error('image')
                        <p style="color:red">{{$message}}</p>
                    @enderror
                    <div class="form-group" >
                    <label>New</label>
                    <select name="new" class="form-control">
                        @if($pro->new==1)
                        <option selected value="1">cu</option>
                        <option value="0">moi</option>
                        @else
                        <option value="1">cu</option>
                        <option selected value="0">moi</option>
                        @endif    
                    </select>
                    </div>
                    <button type="submit" class="btn btn-default">Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection
