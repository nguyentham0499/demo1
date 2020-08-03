@extends('templates.master')

@section('title','Quản lý học sinh')

@section('content')



@if ( Session::has('success') )
	<div class="alert alert-success alert-dismissible" role="alert">
		<strong>{{ Session::get('success') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif

@if ( Session::has('error') )
	<div class="alert alert-danger alert-dismissible" role="alert">
		<strong>{{ Session::get('error') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<div class="col-xs-4 col-xs-offset-4">
	<center><h4>Sửa học sinh</h4></center>
	<form action="{{ url('/hocsinh/update') }}" method="post">
		<input type="hidden" id="_token" name="_token" value="{!! csrf_token() !!}" />
		<input type="hidden" id="HS_MA" name="id" value="{!! $getHocSinhById[0]->HS_MA !!}" />
        <div class="form-group">
			<label for="HS_MA">Mã học sinh</label>
			<input type="text" class="form-control" id="HS_MA" name="HS_MA" placeholder="Mã học sinh" maxlength="20" value="{{ $getHocSinhById[0]->HS_MA }}" required />
		</div>
        <div class="form-group">
			<label for="HS_TEN">Tên học sinh</label>
			<input type="text" class="form-control" id="HS_TEN" name="HS_TEN" placeholder="Tên học sinh" maxlength="100" value="{{ $getHocSinhById[0]->HS_TEN }}" required />
		</div>
		<div class="form-group">
			<label for="HS_DIACHI">Địa chỉ</label>
			<input type="text" class="form-control" id="HS_DIACHI" name="HS_DIACHI" placeholder="Địa chỉ" maxlength="200" value="{{ $getHocSinhById[0]->HS_DIACHI }}" required />
		</div>
		<div class="form-group">
			<label for="HS_SDT">Số điện thoại</label>
			<input type="text" class="form-control" id="HS_SDT" name="HS_SDT" placeholder="Số điện thoại" maxlength="15" value="{{ $getHocSinhById[0]->HS_SDT }}" required />
		</div>
		<form method="get" action="/hocsinh">
					<button type="submit" class="btn btn-custon-rounded-three btn-success">Về danh sách</button>
					<button type="submit" class="btn btn-primary">Lưu lại</button>
		</form>
	</form>
</div>

@endsection