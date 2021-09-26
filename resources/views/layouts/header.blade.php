<div class="navbar bg-light">
    <div class="robotofont">
        <i class="fas fa-home" style="color: red;"></i>
        <span>Số nhà 55, Thôn Xuân Đạt, Xã Phú Xuân, Huyện Krông Năng, Tỉnh DakLak.</span>
    </div>
    <div>
        <i class="fas fa-phone-square-alt" style="color: rgb(33, 226, 33);"></i>
        <span class="robotofont">ĐT 0382892796 | 0386069380</span>
    </div>
    <div>
        <i class="fab fa-facebook-messenger" style="color: rgb(46, 46, 230);"></i>
        <i class="fab fa-facebook-f" style="color: rgb(57, 47, 202);"></i>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e1e1e1;">
    <a class="navbar-brand" href="{{ route('home') }}">
        <div style="font-family: 'Roboto', sans-serif;font-size: 40px;font-weight: 900;color:green;font-style: italic;">
            Bánh Quê</div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Trang chủ</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard') }}">Dasboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Giới thiệu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Liên hệ</a>
            </li>
        </ul>
        @if (Auth::check())
            <span style="color: red;">{{ Auth::user()->name }}</span>
            <a href="{{ route('logout') }}" style="margin-left: 25px;"> Logout</a>
        @else
            <a href="{{ route('login') }}">Login</a>
        @endif
    </div>

</nav>
