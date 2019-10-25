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
    <div class="main-grid">
        <div class="agile-grids">
            <!-- input-forms -->
            <div class="grids">
                <div class="progressbar-heading grids-heading">
                    <h2>Sửa thông tin tour</h2>
                </div>
                <div class="panel panel-widget forms-panel">
                    <div class="forms">
                        <div class="form-grids widget-shadow" data-example-id="basic-forms">
                            <div class="form-title">
                                <h4>Tour {{$tour->id}}</h4>
                            </div>
                            {{--Message--}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(Session::has('msg'))
                                <p style="color: green;">{{Session::get('msg')}}</p>
                            @endif
                                <form action="{{route('updatetour',$params = ['id'=> $tour->id])}}" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tên tour</label>
                                                <input type="text" name="name" class="form-control" value="{{$tour->name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Số ngày</label>
                                                <input type="number" name="songay" class="form-control" value="{{$tour->songay}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Giá cũ</label>
                                                <input type="number" name="gia" class="form-control" value="{{$tour->gia}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Giá mới</label>
                                                <input type="number" name="giamoi" class="form-control" value="{{$tour->giamoi}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Lịch trình</label>
                                                <textarea name="lichtrinh" class="form-control" rows='10'>{{$tour->lichtrinh}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Ngày khởi hành</label>
                                                <input type="date" name="ngaykhoihanh" class="form-control" value="{{$tour->ngaykhoihanh}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nơi khởi hành</label>
                                                <input type="text" name="noikhoihanh" class="form-control" value="{{$tour->noikhoihanh}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Số chỗ</label>
                                                <input type="number" name="socho" class="form-control"  value="{{$tour->socho}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Số chỗ đã đặt</label>
                                                <input type="number" name="sochodadat" class="form-control"  value="{{$tour->sochodadat}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Lưu ý</label>
                                                <textarea name="luuy" class="form-control" rows='10'>{{$tour->luuy}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Chi tiết</label>
                                                <textarea name="chitiet" class="form-control" rows='10'>{{$tour->chitiet}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Điểm đến</label><br>
                                                <input type="text" name="id_diemden" value="{{$tour->id_diemden}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Miền</label><br>
                                                <input type="number" name="id_mien" value="{{$tour->id_mien}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Avatar</label>
                                                <input name="avatar" type="file" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Trạng thái</label>
                                                <input type="number" name="id_status" class="form-control"  value="{{$tour->id_status}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Đánh giá</label>
                                                <input type="number" name="danhgia" class="form-control"  value="{{$tour->danhgia}}">
                                            </div>
                                        </div>
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label>Mã tour</label>--}}
{{--                                                <input type="number" name="id" class="form-control"  value="{{$tour->id}}">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                @csrf()

                                <!-- Modal footer -->
                                    <div style="margin-left: 500px; margin-top: 50px" class="form-footer">
                                        <button type="reset" class="btn btn-danger">Hủy</button>
                                        <button type="submit" class="btn btn-primary">Lưu</button>

                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //input-forms -->
        </div>
    </div>
    <!-- footer -->
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
