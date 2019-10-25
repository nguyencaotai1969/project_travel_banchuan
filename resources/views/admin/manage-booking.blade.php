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
    <style>
        .popup h2 {
            text-align: center;
        }

        .popup {
            text-align: center;
            padding-top: 130px;
        }
        table{text-align: center;}
    </style>
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
                <table class="table table-striped table-condensed">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên khách hàng</th>
                        <th>ID tour</th>
                        <th>SĐT</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>Ngày đặt</th>
                        <th>Thanh toán</th>
                        <th>Tình trạng</th>
                        <th>ID tài khoản</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listbooking as $stt => $booking)
                        <tr>
                            <td>{{$booking->id}}</td>
                            <td>{{$booking->name}}</td>
                            <td>{{$booking->id_tour}}</td>
                            <td>{{$booking->phone}}</td>
                            <td>{{$booking->address}}</td>
                            <td>{{$booking->email}}</td>
                            <td>{{$booking->time}}</td>
                            @php
                                if($booking->pay == 1)
                                    echo '<td><span class="label label-primary">Tiền mặt</span></td>';

                                if($booking->pay == 2)
                                    echo '<td><span class="label label-primary">Chuyển khoản</span></td>'
                            @endphp
                            @php
                                if($booking->id_status == 0)
                                    echo '<td><span class="label label-default">Hủy</span></td>';

                                if($booking->id_status == 1)
                                    echo '<td><span class="label label-danger">Chưa cọc</span></td>';

                                if($booking->id_status == 2)
                                    echo '<td><span class="label label-warning">Đã cọc</span></td>';

                                if($booking->id_status == 3)
                                    echo '<td><span class="label label-success">Đã thanh toán</span></td>';
                            @endphp
                            <td>{{$booking->id_user}}</td>

                            
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    <a href="{{route('getchangebooking',$booking->id)}}">Sửa</a>
                                </button>
                            </td>
                            <td>
{{--                                Xóa--}}

                                <button type="button" data-idsp="{{$booking->id}}" data-linkdel="{{route('deletebooking',$booking->id)}}" class="btn btn-small btn-danger del" data-toggle="modal" data-target="#delete">
                                    Xóa
                                </button>

                                <!-- The Modal -->

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="modal" id="delete">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Chú ý</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body" id="delete-body">

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal">Không</button>

                                <a class="btn btn-danger" id="link-del" href="#">Có</a>
                        </div>

                    </div>
                </div>
            </div>
            
        </div>
    </div>      <!-- footer -->
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

    $(document).on("click", ".del", function () {
        var TourId = $(this).data('idsp');
        $("#delete-body").html( "Bạn có chắc muốn xóa đơn này? " + TourId);
        var Link = $(this).data('linkdel');
        $("#link-del").attr( "href" , Link);
        // As pointed out in comments,
        // it is unnecessary to have to manually call the modal.
        // $('#addBookDialog').modal('show');
    });
    
</script>
</body>
</html>
