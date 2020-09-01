<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <!-- <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div> -->
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="admin/theloai/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i> The Loai<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('Category.list')}}">Danh sach</a>
                                    <!-- admin/theloai/danhsach -->
                                </li>
                                <li>
                                    <a href="{{route('Category.add')}}">them</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/theloai/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i> San Pham<span class="fa arrow"></span></a>
                            <!-- admin/theloai/danhsach -->
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('Product.list')}}">Danh sach</a>
                                </li>
                                <li>
                                    <a href="{{route('Product.add')}}">them</a>
                                    <!-- admin/loaitin/them -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <!-- <li> -->
                            <!-- <a href="admin/tintuc/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i> tin tuc<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/tintuc/danhsach">Danh sach</a>
                                </li>
                                <li>
                                    <a href="admin/tintuc/them">them</a>
                                </li>
                            </ul> -->
                            <!-- /.nav-second-level -->
                        <!-- </li> -->
                        <li>
                            <a href=""><i class="fa fa-bar-chart-o fa-fw"></i> slide<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('Slide.list')}}">Danh sach</a>
                                    <!-- admin/slide/danhsach -->
                                </li>
                                <li>
                                    <a href="{{route('Slide.add')}}">them</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href=""><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('User.list')}}">danh sach</a>
                                </li>
                                <!-- <li>
                                    <a href="">Add</a>
                                </li> -->
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>