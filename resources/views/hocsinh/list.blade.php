@extends('templates.master')

@section('title','Quản lý học sinh')

@section('content')

<?php //Hiển thị thông báo thành công?>
<div class="page-header"><h4>Quản lý học sinh</h4></div>

@if ( Session::has('success') )
	<div class="alert alert-success alert-dismissible" role="alert">
		<strong>{{ Session::get('success') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif

<?php //Hiển thị thông báo lỗi?>
@if ( Session::has('error') )
	<div class="alert alert-danger alert-dismissible" role="alert">
		<strong>{{ Session::get('error') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif

<?php //Hiển thị danh sách học sinh?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="table-responsive">
		<form method="get" action="/hocsinh/create">
			<button type="submit">Thêm mới</button>
		</form>
			<table id="DataList" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Mã học sinh</th>
						<th>Tên học sinh</th>
                        <th>Địa chỉ</th>
						<th>Số điện thoại</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php //Khởi tạo vòng lập foreach lấy giá vào bảng?>
				@foreach($listhocsinh as $key => $hocsinh)
					<tr>
                        <td>{{ $hocsinh->HS_MA }}</td>
						<td>{{ $hocsinh->HS_TEN }}</td>
                        <td>{{ $hocsinh->HS_DIACHI }}</td>
						<td>{{ $hocsinh->HS_SDT }}</td>
						<td><a href="/hocsinh/{{ $hocsinh->HS_MA }}/edit" class="btn btn-custon-rounded-three btn-warning">Sửa</a>|<a href="/hocsinh/{{ $hocsinh->HS_MA }}/delete" class="btn btn-custon-rounded-three btn-danger">Xóa</a></td>
					</tr>
				<?php //Kết thúc vòng lập foreach?>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection