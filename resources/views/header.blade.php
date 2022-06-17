<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <!-- Link Bootstrap5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <!-- Link icon Bootstrap5 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
  <!-- Link OwlCarousel2 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- link css custom -->
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <div id="btnScrollTop">
    <i class="bi bi-arrow-up-short"></i>
  </div>
  <header>
    <div class="header-top bg-primary">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 col-sm-12">
            <ul class="nav ">
              <li class="nav-item">
                <a class="nav-link  text-light" href="mailto: "> <i class="bi bi-envelope"></i> fit@vnu.edu.vn</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="tel:02437547064"> <i class="bi bi-telephone"></i> (024) 3 754 7064</a>
              </li>
          </div>
          <div class="col-md-6 col-sm-12">
            <ul class="nav align-items-center justify-content-end">
              <a class="p-1 nav-link text-light" href="{{route('formLogin')}}"><i class="bi bi-person-fill"></i> Đăng nhập</a>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="header-bottom ">
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
              <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                  <ul class="navbar-nav align-items-center main__menu">
                    <li class="nav-item menu__item">
                      <a class="nav-link menu__link" href="#">Giới thiệu</a>
                      <ul class="position-absolute sub__menu">
                        <li class="sub__item"><a class="sub__link" href="">Quá trình phát triển</a> </li>
                        <li class="sub__item"><a class="sub__link" href="">Tầm nhìn và sứ mệnh</a> </li>
                        <li class="sub__item"><a class="sub__link" href="">Ban chủ nhiệm Khoa</a> </li>
                        <li class="sub__item"><a class="sub__link" href=""> Các bộ môn và phòng thí nghiệm</a></li>
                        <li class="sub__item"><a class="sub__link" href=""> Giảng viên</a></li>
                        <li class="sub__item"><a class="sub__link" href=""> Liên hệ</a></li>
                      </ul>
                    </li>
                    <li class="nav-item menu__item">
                      <a class="nav-link menu__link" href="#">Đào tạo</a>
                      <ul class="position-absolute sub__menu">
                        <li class="sub__item"><a class="sub__link" href="">Đại học</a> </li>
                        <li class="sub__item"><a class="sub__link" href="">Sau đại học</a> </li>

                      </ul>
                    </li>
                    <li class="nav-item menu__item">
                      <a class="nav-link menu__link" href="#">Nghiên cứu</a>
                      <ul class="position-absolute sub__menu">
                        <li class="sub__item"><a class="sub__link" href="">Các đề tài dự án</a> </li>
                        <li class="sub__item"><a class="sub__link" href="">Các sản phẩm công nghệ</a> </li>
                        <li class="sub__item"><a class="sub__link" href="">Chuyên gia CNTT-TT</a> </li>
                        <li class="sub__item"><a class="sub__link" href="">Đối tượng hàn lâm</a></li>
                      </ul>
                    </li>
                    <li class="nav-item logo d-none d-lg-block">
                      <a class="navbar-brand logo" href="#"></a>
                    </li>
                    <li class="nav-item menu__item">
                      <a class="nav-link menu__link" href="#">Hợp tác</a>
                      <ul class="position-absolute sub__menu">
                        <li class="sub__item"><a class="sub__link" href="">Trung tâm NCUD&HTDN</a> </li>
                        <li class="sub__item"><a class="sub__link" href="">Đối tác khối công nghệ</a> </li>
                      </ul>
                    </li>
                    <li class="nav-item menu__item">
                      <a class="nav-link menu__link" href="#">Tin tức</a>
                    </li>
                    <li class="nav-item menu__item">
                      <a class="nav-link menu__link" href="#">Người học</a>
                      <ul class="position-absolute sub__menu">
                        <li class="sub__item"><a class="sub__link" href="">Thành tích nổi bật</a> </li>
                        <li class="sub__item"><a class="sub__link" href="">Thông tin việc làm</a> </li>
                        <li class="sub__item"><a class="sub__link" href="">Các câu hỏi thường gặp</a> </li>
                        <li class="sub__item"><a class="sub__link" href=""> Cựu sinh viên</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>