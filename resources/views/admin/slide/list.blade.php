@extends('layouts.index')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>List</small>
                        </h1>
                    </div>
                    @error('thongbao')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>image</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($slides as $key=>$tl)
                            <tr class="even gradeC" align="center">
                                <td>{{$key+1}}</td>
                                <td><img src="{{asset('upload/avatar/'.$tl->image)}}" alt="" width="100px"></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/slide/delete/{{$tl->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slide/edit/{{$tl->id}}">Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection
