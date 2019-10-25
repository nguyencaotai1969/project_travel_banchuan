
@extends('master-layout')
@section('title','Trang Chủ')
@section('content')
    @include('carosel_home')
    <link rel="stylesheet" type="text/css" href="{{asset('css/trangchu/trangchu.css')}}">
    {{-- Tour giờ vàng   --}}
    <div class="container">
        <div class="text-center tour-gio-vang pt-2">
            <h2 style="margin-top: 40px">Tour mới nhất</h2>
        </div>
        <div class="row">

            <div class="new-arrival">

                <div class="titlebar">

                    <div class="next-back">
                    <span>
                        <a data-slide="prev" href="#Carousel" class="left carousel-control"><img
                                src="{{asset('img/back_botton.png')}}" width="20"
                                alt="">
                        </a>
                    </span>
                        <span>
                        <a data-slide="next" href="#Carousel" class="right carousel-control"><img
                                src="
                                {{asset('img/next_botton.png')}}" width="17" alt="">
                        </a>
                    </span>
                    </div>
                </div>
                <div class="arrival-product">
                    <div id="Carousel" class="carousel slide" data-ride="carousel">
                        <!-- Carousel items -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    @foreach($listtour as $stt => $tour)
                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                            <div class="product-grid">
                                                <div class="product-image">
                                                    <a href="{{route('chitiettour',$tour->id)}}">
                                                        <img class="pic-1"
                                                             src="storage/tour/avatar/{{$tour->avatar}}" >
                                                        <img class="pic-2"
                                                             src="storage/tour/avatar/{{$tour->avatar}}">
                                                    </a>

                                                    <span class="product-new-label ">Còn <b class="demo"></b></span>
                                                    <span class="product-discount-label">{{round(((($tour->gia)-($tour->giamoi))*100)/$tour->gia)}}%</span>
                                                </div>
                                                <ul class="rating">
                                                    <span><b>{{$tour->danhgia}}</b></span>
                                                    <li class="fa fa-star"></li>
                                                    <li class="fa fa-star"></li>
                                                    <li class="fa fa-star"></li>
                                                    <li class="fa fa-star"></li>
                                                    <li class="fa fa-star disable"></li>


                                                </ul>
                                                <div class="product-content">
                                                    <h3 class="title">
                                                        <a href="{{route('chitiettour',$tour->id)}}">{{$tour->name}}
                                                            <img
                                                                src="{{asset('img/hot.gif')}}" alt="">
                                                        </a>
                                                    </h3>
                                                    <div class="price">{{number_format($tour->giamoi)}}đ
                                                        <span>{{number_format($tour->gia)}}đ</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row">
                                            @foreach($listtour as $stt => $tour)
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <div class="product-grid">
                                                        <div class="product-image">
                                                            <a href="{{route('chitiettour',$tour->id)}}">
                                                                <img class="pic-1"
                                                                     src="https://staticproxy.mytourcdn.com/1000x600,q90/resources/pictures/hotels/9/6gV86nE7QPC9Zeic8KRsLg-38.jpeg">
                                                                <img class="pic-2"
                                                                     src="https://tour.dulichvietnam.com.vn/uploads/tour/1554714181_tour-ha-long-11.jpg">
                                                            </a>

                                                            <span class="product-new-label demo"></span>
                                                            <span class="product-discount-label">{{round(((($tour->gia)-($tour->giamoi))*100)/$tour->gia)}}%
                                                        </span>
                                                        </div>
                                                        <ul class="rating">
                                                            <li class="fa fa-star"></li>
                                                            <li class="fa fa-star"></li>
                                                            <li class="fa fa-star"></li>
                                                            <li class="fa fa-star"></li>
                                                            <li class="fa fa-star disable"></li>
                                                            <span>{{$tour->danhgia}}</span>
                                                        </ul>
                                                        <div class="product-content">
                                                            <h3 class="title">
                                                                <a href="{{route('chitiettour',$tour->id)}}">{{$tour->name}}
                                                                    <img
                                                                        src="{{asset('img/hot.gif')}}" alt="">
                                                                </a>
                                                            </h3>
                                                            <div class="price">{{number_format($tour->giamoi)}}đ
                                                                <span>{{number_format($tour->gia)}}đ</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Carousel-->
                </div>
            </div>
        </div>
    </div>

    {{-- Tour khuyến mai --}}
    <div class="container">
        <h2 style="margin-top: 40px" class="text-center tour-gio-vang">Tour Khuyến Mãi</h2>
        <div class="row" id="ads">
            <!-- Category Card -->
            @foreach($toursale as $stt => $tour)
                <div class="col-md-4 col-xs-12 col-sm-12 p-2">
                    <div class="card rounded">
                        <div class="card-image">
                            <span class="card-notify-badge">{{$tour->songay}} ngày</span>
                            <span class="card-notify-year">{{round(((($tour->gia)-($tour->giamoi))*100)/$tour->gia)}}%</span>
                            <a href="{{route('chitiettour',$tour->id)}}">

                                <img class="img-fluid" src="storage/tour/avatar/{{$tour->avatar}}"
                                 alt="Alternate Text"/>
                            </a>
                        </div>
                        <div class="card-image-overlay m-auto">
                            <span class="card-detail-badge">{{number_format($tour->giamoi)}}đ</span>
                            <span class="card-detail-badge khuyenmai-giamgia"><Strike>{{number_format($tour->gia)}}đ</Strike></span>
                        </div>
                        <div class="card-body text-center">
                            <div class="ad-title m-auto">
                                <a href="{{route('chitiettour',$tour->id)}}">
                                <h5>{{$tour->name}}</h5></a>
                            </div>
                            <a class="ad-btn" href="{{route('chitiettour',$tour->id)}}">Xem</a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>

    {{-- Điểm Đến Yêu Thích --}}
    <section class="our-webcoderskull padding-lg">
        <h2 class="text-center tour-gio-vang">Điểm Đến Yêu Thích Của Bạn</h2>
        <div class="container">
            <ul class="row">
                @foreach($listdes as $stt => $des)

                    <li class="col-12 col-md-6 col-lg-3">
                        <a href="{{route('diemden',$des->id)}}">
                        <div class="cnt-block equal-hight">
                            <figure>
                                <img
                                    src="storage/tour/des/{{$des->img}}" alt="">
                            </figure>

                            <ul class="follow-us clearfix">
                                <li><h3>{{$des->name}}</h3></a></li>

                            </ul>
                        </div>
                    </li>

                @endforeach
            </ul>
        </div>
    </section>

    {{-- our carosel --}}


    <div class="container">
        <h2 class="text-center tour-gio-vang">Đối Tác Của Chúng Tôi</h2>
        <section class="customer-logos-ourcarosel slider">
            <div class="slide"><img src="{{asset('img/logo_doitac/1.jpg')}}">
            </div>
            <div class="slide"><img src="{{asset('img/logo_doitac/2.jpg')}}"></div>
            <div class="slide"><img src="{{asset('img/logo_doitac/3.png')}}"></div>
            <div class="slide"><img
                    src="{{asset('img/logo_doitac/4.png')}}"></div>
            <div class="slide"><img src="{{asset('img/logo_doitac/5.png')}}"></div>
            <div class="slide"><img
                    src="{{asset('img/logo_doitac/6.png')}}"></div>
            <div class="slide"><img src="{{asset('img/logo_doitac/7.jpg')}}"></div>
        </section>

    </div>
    <script type="text/javascript" src="{{asset('js/datetime.js')}}"></script>
@endsection
@section('js')
    <script type="text/javascript" src="{{asset('js/ourcarosel.js')}}"></script>
@endsection
