@extends('layouts.index')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">product
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                     @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{ session('thongbao') }}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>ten sp</th>
                                <th>Gia</th>
                                <th>danh muc</th>
                                <th>anh</th>
                                <th>status</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productlist as $lt)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $lt->pro_id }}</td>
                                <td>{{ $lt->name }}</td>
                                <td>{{ $lt->unit_price }}</td>
                                <td>{{ $lt->type_name }}</td>
                                <td><img src="{{asset('upload/avatar/'.$lt->image)}}" alt="" width="200"></td>
                                <td>{{ $lt->new }}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/delete/{{ $lt->pro_id }}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/edit/{{ $lt->pro_id }}">Edit</a></td>
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
