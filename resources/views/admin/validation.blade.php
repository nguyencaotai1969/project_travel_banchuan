<!DOCTYPE html>
<head>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Colored Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() {setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link rel="stylesheet" href="{{asset('css/admin/bootstrap.css')}}">
<link href="{{asset('css/admin/style.css')}}" rel='stylesheet' type='text/css'/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css
">
    <link
        href="https://fonts.googleapis.com/css?family=Baloo|Charm|IBM+Plex+Serif|Lobster|Playfair+Display&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Baloo|Baloo+Paaji|Charm|IBM+Plex+Serif|Lobster|Pattaya|Playfair+Display&display=swap"
        rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/admin/font.css')}}" type="text/css"/>
<script src="{{asset('js/admin/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('js/admin/modernizr.js')}}"></script>
<script src="{{asset('js/admin/jquery.cookie.js')}}"></script>
<script src="{{asset('js/admin/jquery.cookie.js')}}"></script>
<script src="{{asset('js/admin/raphael-min.js')}}"></script>
<script src="{{asset('js/admin/morris.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/admin/morris.css')}}">
<script src="{{asset('js/admin/skycons.js')}}"></script>
<!--//skycons-icons-->
</head>
<body class="dashboard-page">
@include('admin.header.header_left')

	<section class="wrapper scrollable">
		<nav class="user-menu">
			<a href="javascript:;" class="main-menu-access">
			<i class="icon-proton-logo"></i>
			<i class="icon-reorder"></i>
			</a>
		</nav>
@include('admin.header.header_top')
    <div class="container">
            <div class="row">
                <div class="span5">
                    <table class="table table-striped table-condensed">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên tour</th>
                            <th>Giá cũ</th>
                            <th>Giá mới</th>
                            <th>Lịch trình</th>
                            <th>Số ngày</th>
                            <th>Ngày khởi hành</th>
                            <th>Nơi khởi hành</th>
                            <th>Số chỗ</th>
                            <th>Số chỗ đã đặt</th>
                            <th>Lưu ý</th>
                            <th>Chi tiết</th>
                            <th>Avatar</th>
                            <th>ID điểm đến</th>
                            <th>ID miền</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($listtour as $stt => $tour)
                            <tr>
                                <td>{{$tour->id}}</td>
                                <td>{{$tour->name}}</td>
                                <td>{{$tour->gia}}</td>
                                <td>{{$tour->giamoi}}</td>
                                <td>{{$tour->lichtrinh}}</td>
                                <td>{{$tour->songay}}</td>
                                <td>{{$tour->ngaykhoihanh}}</td>
                                <td>{{$tour->noikhoihanh}}</td>
                                <td>{{$tour->socho}}</td>
                                <td>{{$tour->sochodadat}}</td>
                                <td>{{$tour->luuy}}</td>
                                <td>{{$tour->chitiet}}</td>
                                <td><img style="width: 100px" src="{{base_path.$tour->avatar}}"></td>
                                <td>{{$tour->id_diemden}}</td>
                                <td>{{$tour->id_mien}}</td>
                                @php
                                    if($tour->id_status == 0)
                                        echo '<td><span class="label">Hủy</span></td>';

                                    if($tour->id_status == 1)
                                        echo '<td><span class="label label-success">Chưa đủ</span></td>';

                                    if($tour->id_status == 2)
                                        echo '<td><span class="label label-warning">Đã đủ</span></td>';

                                    if($tour->id_status == 3)
                                        echo '<td><span class="label label-important">Đã hoàn thành</span></td>';
                                @endphp
                                <td><a href="#" class="btn btn-small btn-primary">Sửa</a>
                                    <a href="#" class="btn btn-small"><i class="btn-icon-only icon-remove"></i>	</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>		<!-- footer -->
		<!-- //footer -->
	</section>
	<script src="{{asset('js/admin/bootstrap.js')}}"></script>
	<script src="{{asset('js/admin/proton.js')}}"></script>
	<script>
	        var theme = $.cookie('protonTheme') || 'default';
	        $('body').removeClass (function (index, css) {
	            return (css.match (/\btheme-\S+/g) || []).join(' ');
	        });
	        if (theme !== 'default') $('body').addClass(theme);
        </script>
</body>
</html>
