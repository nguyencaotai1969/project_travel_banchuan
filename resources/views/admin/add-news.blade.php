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
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('ckfinder/ckfinder.js')}}"></script>	

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
                    <h2>Thêm Tin Tức</h2>
                </div>
                <div class="panel panel-widget forms-panel">
                    <div class="forms">
                        <div class="form-grids widget-shadow" data-example-id="basic-forms">
                            <div class="form-title">
                                <h4>Thêm tin tức :</h4>
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
                            <div class="form-body">
                                <form action="{{route('admin_news_save')}}" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Tiêu đề</label>
                                        <input type="text" name="tieude" class="form-control" placeholder="Tên tour">
                                    </div>
                                    <div class="form-group">
                                        <label>Tóm tắt</label>
                                        <input type="text" name="tomtat" class="form-control" placeholder="Tóm tắt">
                                    </div>
                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <textarea name="noidung" class="form-control" placeholder="Nội dung" rows='10' id='noidung'></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Avatar</label>
                                        <input name="avatar" type="file">
                                    </div>
                                    <div class="form-group">
                                        <label>Điểm đến</label><br>
                                        <select name="diemden">
                                            @foreach($listDes as $des)
                                                <option value="{{$des->id}}">{{$des->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-default w3ls-button">Submit</button>
                                    @csrf()
                                </form>
                            </div>
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
<script> CKEDITOR.replace('noidung', {
        filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    }); 
    // var textarea = document.getElementById('noidung');
    // var noidung = CKEDITOR.instances['noidung'].getData();
    // element.innerHTML = noidung;
    // alert(" your data is :"+noidung);
    
</script>
</body>
</html>
