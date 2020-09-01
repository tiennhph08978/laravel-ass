@extends('layouts.indexfontend')
@section('content')
<div class="container">
		<div id="content">
			
			<form action="{{route('postdangki')}}" method="post" class="beta-form-checkout">
                @csrf
				<div class="row">
                    <div class="col-sm-3"></div>
                    @if(Session::has('thongbao'))
                    <p style="color:green">{{Session::get('thongbao')}}</p>
                    @endif
					<div class="col-sm-6">
                    @if(count($errors)>0)
                    <p style="color:red">
                    @foreach($errors->all() as $err)
                        {{$err}} <br>
                    @endforeach
                    </p>
                    @endif
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" name='email' id="email" >
						</div>  
						<div class="form-block">
							<label for="your_last_name">Fullname*</label>
							<input type="text" name="fullname" id="your_last_name" >
						</div>

						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" name="phone" id="phone" >
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" id="password" name="password">
						</div>
						<div class="form-block">
							<label for="phone">Re password*</label>
							<input type="password" id="re_password" name="re_password">
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection