<link rel="stylesheet" type="text/css" href="{{asset('css/carosel.css')}}">
<div>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('img/boats-hoi-an-lights-free-stock-photo-image-wallpaper.jpeg')}}"
                     class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('img/1736033.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('img/2557952.jpg')}}" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<div class="search-sec">
    <div class="container">
        <form action="{{route('timkiem')}}" method="post">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                    <select name="noikhoihanh" class="form-control search-slt" id="exampleFormControlSelect1">
                        <option value="%">Khởi hành</option>
                        @foreach($khoihanh as $stt => $v)
                            @php $v = (array)$v; @endphp
                            <option value="{{$v['noikhoihanh']}}">{{$v['noikhoihanh']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                    <select name="diemden" class="form-control search-slt" id="exampleFormControlSelect1">
                        <option value="%">Điểm đến</option>
                        @foreach($diemden as $stt => $v)
                            @php $v = (array)$v;@endphp
                            <option value="{{$v['id']}}">{{$v['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                    <select name="giamoi" class="form-control search-slt" id="exampleFormControlSelect1">
                        <option value="%">Mức giá</option>
                        
                            <option value="1">0-5.000.000đ</option>
                            <option value="2">5.000.000đ-10.000.000đ</option>
                            <option value="3">10.000.000đ</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                    <input type="submit" class="btn btn-primary wrn-btn" value="Tìm kiếm">
                </div>
            </div>
            @csrf()
        </form>
    </div>
</div>
