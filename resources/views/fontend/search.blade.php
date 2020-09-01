@extends('layouts.indexfontend')
@section('content')
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Tim kiem</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($product as $new_pro)
								<div class="col-sm-3">
									<div class="single-item">	
										<div class="single-item-header">
											<a href="product.html"><img hieght="20%" src='{{asset("/upload/avatar/".$new_pro->image)}}' alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$new_pro->name}}</p>
											<p class="single-item-price">
											@if($new_pro->promotion_price == 0)	
												<span class="flash-share">{{number_format($new_pro->unit_price)}}đ</span>
											@else
												<span class="flash-del">{{number_format($new_pro->unit_price)}}đ</span>
												<span class="flash-share">{{number_format($new_pro->promotion_price)}}đ</span>	
											@endif	
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('Font.add-cart', $new_pro->pro_id)}}"><i class="fa fa-shopping-cart"></i></a>
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
    </div>
@endsection