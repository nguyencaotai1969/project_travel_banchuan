@extends('master-layout')
@section('title','Liên Hệ')
<link rel="stylesheet" type="text/css" href="{{asset('css/lienhe/lienhe.css')}}">
<style>
    .infor-tour h3 {color: #2d51a3;
        text-align: center;
        margin-top: 120px;
    }
    .detail {
        background-color: #f1f1f1;
        display: flex;
        align-items: center;
    }
    @media (max-width: 575.98px) {
        .image-1 img {
            margin-bottom: 20px;
        }

        .detail {
            background-color: white
        }
    }
</style>
@section('content')
    <section>
        <div class="container infor-tour">
            <h3>Thông Tin Tour Của Bạn</h3><br>
            <div class="row text-left text-xs-center text-md-left" id="des-detail">
                <div class="image-1 col-md-5">
                    <img class="col-md-12" src="../storage/tour/avatar/{{$tour->avatar}}" alt="">
                </div>
                <div class="detail col-md-7 ml-auto row">
                    <h4 class="col-12">{{$tour->name}}</h4><br>
                    <div class="left col-md-6">
                        <span><b>{{$tour->danhgia}}</b></span>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star"></i><br>
                        <span>Mã: {{$tour->id}}</span><br>
                        <span>Thời gian: {{$tour->songay}} ngày</span><br>
                        <span>Nơi khởi hành: {{$tour->noikhoihanh}}</span><br>
                        <span>Ngày khởi hành: {{$tour->ngaykhoihanh}}</span>
                    </div>
                    <div class="right col-md-6 ml-auto">
                        <span>Số chỗ còn:  {{($tour->socho)-($tour->sochodadat)}}</span><br><br>
                        <span>Giá 1 khách:</span><br>
                        <span style="color: red; font-size: 22px"><b>{{number_format($tour->giamoi)}}đ</b></span>
                    </div>

                </div>
            </div>

            <div class="contact">

                <h3>Thông tin liên hệ</h3><br>
                @if ($errors->any())
                    <div >
                        <ul class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('msg'))
                    <p style="color: green;">{{Session::get('msg')}}</p>
                @endif
                <form method="post" action="{{route('luudon',$params = ['id'=> $tour->id])}}">
                    <div class="row">
                        <div class="contact-left col-6 col-xs-12 form-group">
                            <p>Họ và tên</p>
                            <input type="text" class="form-control" name="name" value="" placeholder="Họ tên"><br>
                            <p>Email</p>
                            <input type="email" class="form-control" name="email" value="" placeholder="E-mail"><br>
                            <p>Phương thức thanh toán</p>
                            <p><input type="radio" name="pay" value="1"> Tiền mặt</p>
                            <p><input type="radio" name="pay" value="2"> Chuyển khoản</a>
                        </div>
                        <div class="contact-right col-6 col-xs-12">
                            <p>Điện thoại</p>
                            <input type="tel" class="form-control" name="phone" value="" placeholder="Phone"><br>
                            <p>Địa chỉ</p>
                            <input type="address" class="form-control" name="address" value="" placeholder="Địa chỉ"><br>
                        </div>
                    </div>
                    <h2 class="text-center p-3">
                        <input class="btn btn-primary" type="submit" name="button" value="Đăng ký">
                    </h2>
                    @csrf()
                </form>
            </div>
        </div>
    </section>


@endsection
