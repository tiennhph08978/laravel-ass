@extends('layouts.index')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">the loai
                            <small>them</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">

                        @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{ session('thongbao') }}
                        </div>
                        @endif
                        <form action="admin/category/upload/{{$cate->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label>Ten The Loia</label>
                                <input class="form-control" name="type_name" placeholder="điền Name" value="{{ $cate->type_name }}" />
                            </div>
                            @error('type_name')
                                <p style="color:red">{{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label>Des</label>
                                <input class="form-control" name="description" placeholder="điền Des" value="{{ $cate->description }}" />
                            </div>
                            @error('description')
                                <p style="color:red">{{$message}}</p>
                            @enderror
                            <button type="submit" class="btn btn-default">Category Edit</button>
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
