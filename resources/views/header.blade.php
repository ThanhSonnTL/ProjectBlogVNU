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
                  @for($i=0;$i<count($categories);$i++)
                    <li class="nav-item menu__item">
                      <a class="nav-link menu__link" href="#">{{$categories[$i]->category_title}}</a>
                      <ul class="position-absolute sub__menu">
                        @for($j=0;$j<count($categoryChildrent);$j++)
                          @if(($categoryChildrent[$j]->category_parent) == ($categories[$i]->category_ID))
                            <li class="sub__item"><a class="sub__link" href="">{{$categoryChildrent[$j]->category_title}}</a></li>
                          @endif
                        @endfor
                      </ul>
                      @if($i == 2)
                          <li class="nav-item logo d-none d-lg-block">
                              <a class="navbar-brand logo" href="#"></a>
                          </li>
                      @endif
                    </li>
                    @endfor
                  </ul>
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>