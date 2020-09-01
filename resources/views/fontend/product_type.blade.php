@extends('layouts.indexfontend')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$cate_pro->type_name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('Font')}}">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($cate as $cate)
							<li><a href="{{route('Font.product_type', $cate->id)}}">{{$cate->type_name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>New Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">có {{count($pro_cate)}} sp</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($pro_cate as $pro)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="product.html"><img src="{{asset('/upload/avatar/'.$pro->image)}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$pro->name}}</p>
											<p class="single-item-price">
												@if($pro->promotion_price==0)
												<span class="flash-share">{{number_format($pro->unit_price)}}đ</span>
												@else
												<span class="flash-del">{{number_format($pro->unit_price)}}đ</span>
												<span class="flash-share">{{number_format($pro->promotion_price)}}đ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection