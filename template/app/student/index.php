<?php
require_once(BASE_PATH . '/template/app/student/layouts/header.php');
?>
    <title>پروتال دانش آموز</title>
<?php
require_once(BASE_PATH . '/template/app/student/layouts/link.php');
?>
    <!-- Demo styles -->
    <style>
      .event {
        position: relative;
        height: 100%;
        background: #2c3e50;
        font-size: 14px;
        color: #e6f0fa;
        margin: 0;
        padding: 0;
      }
      .swiper {
        border-radius: 2rem;
      }
      .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #444;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        max-height: 100%;
        object-fit: cover;
      }
    </style>
<?php
require_once(BASE_PATH . '/template/app/student/layouts/menu.php');
?>

    <section>
      <div class="event">
        <div class="container">
          <div class="row py-5">
            <div class="col-12">
                <img src="<?= url('public/image/clouds.png') ?>" class="swiper_clouds" alt="">
              <!-- Swiper -->
              <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <img src="<?= url('public/image/school4-5.jpg') ?>" alt="" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= url('public/image/school2-3.jpg') ?>" alt="" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= url('public/image/school4-5.jpg') ?>" alt="" />
                  </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
              </div>
               <img src="<?= url('public/image/car.png') ?>" class="swiper_car" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="fild">
        <div class="container-fluid">
          <div class="row pt-5 position-relative">
       
            <div class="col-md-5">
              <div class="fild_image">
                <div class="fild_image-img1">
                  <img
                    src="<?= url('public/image/photo_2025-09-03_20-31-57.jpg') ?>"
                    class="fild_image-img1-1"
                  />
                </div>
                <div class="fild_image-img2">
                  <img
                    src="<?= url('public/image/photo_2025-09-03_20-31-59.jpg') ?>"
                    alt="عکس کلاس"
                    class="fild_image-img2-2"
                  />
                </div>
              </div>
            </div>
                 <div class="col-md-7">
              <div class="row g-2">
                <div class="col-6 col-lg-4">
                  <a href="<?= url('student/camp') ?>" class="fild_box btn px-1">
                    <div class="fild_box-content">
                      <img src="<?= url('public/image/tent.png') ?>" class="img-fuind" alt="اردو ها" />
                      <p>اردو ها</p>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-lg-4">
                  <a href="<?= url('student/medicine') ?>" class="fild_box btn px-1">
                    <div class="fild_box-content">
                      <img src="<?= url('public/image/medicine.png') ?>" class="img-fuind" alt="دارو ها" />
                      <p>دارو ها</p>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-lg-4">
                  <a href="<?= url('student/video') ?>" class="fild_box btn px-1">
                    <div class="fild_box-content">
                      <img src="<?= url('public/image/webinar.png') ?>" class="img-fuind" alt="فیلم های آموزشی" />
                      <p>فیلم های آموزشی</p>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-lg-4">
                  <a href="<?= url('student/grades') ?>" class="fild_box btn px-1">
                    <div class="fild_box-content">
                      <img src="<?= url('public/image/test.png') ?>" class="img-fuind" alt="نمرات" />
                      <p>نمرات</p>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-lg-4">
                  <a href="<?= url('student/assignments') ?>" class="fild_box btn px-1">
                    <div class="fild_box-content">
                      <img src="<?= url('public/image/chatting.png') ?>" class="img-fuind" alt="تکالیف" />
                      <p>تکالیف</p>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-lg-4">
                  <a href="<?= url('student/leisureTime') ?>" href="index.html" class="fild_box btn px-1">
                    <div class="fild_box-content">
                      <img src="<?= url('public/image/games.png') ?>" class="img-fuind" alt="اوقات فراقت" />
                      <p>اوقات فراقت</p>
                    </div>
                  </a>
                </div>
              </div>
              <img src="<?= url('public/image/moon (1).png') ?>" class="fild_moon" alt="عکس ماه" />
            </div>
            <img src="<?= url('public/image/fly.png') ?>" class="fild_fly" alt="عکس قلب و ستاره" />
          </div>
        </div>
      </div>
    </section>
<?php
require_once(BASE_PATH . '/template/app/student/layouts/footer.php');
?>
<script src="<?= url('public/js/studentFolder.js') ?>"></script>


  </body>
</html>
