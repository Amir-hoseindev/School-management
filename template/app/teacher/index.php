<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/header.php');
?>
    <title>پروتال معلم</title>
<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/link.php');
?>
<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/menu.php');
?>
    <section>
      <div class="teacher_welcome">
        <div class="container-fluid">
          <div class="row d-flex align-items-center">
            <div class="col-md-7">
              <div class="teacher_welcome-content">
                <img
                  src="<?= url('public/image/shining.png') ?>"
                  class="teacher_welcome-content-img1"
                  alt="آیکن ستاره"
                />
                <p class="fs-1 fw-bold text-center px-4">
                  <?= $teacher['name'] .' '. $teacher['last_name'] ?> خوش آمدید
                </p>
                <p class="fs-4 fw-bold text-center">
                  سال جدید ، فرصت جدیدی برای الهام بخشی به دنش آموزان است .
                  کارتابل شما آماده است
                </p>
                <img
                  src="<?= url('public/image/shining.png') ?>"
                  class="teacher_welcome-content-img2"
                  alt="آیکن ستاره"
                />
              </div>
            </div>

            <div class="col-md-5">
              <div class="teacher_welcome-image">
                <div class="teacher_welcome-image-img">
                  <img
                    src="<?= url('public/image/35d913d1d28ac8a3d5a8092d1183c37b.jpg') ?>"
                    alt="عکس معلم"
                  />
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <div class="teacher_folder-arc">
              <svg
                viewBox="0 0 500 150"
                preserveAspectRatio="none"
                style="height: 100%; width: 100%"
              >
                <path
                  d="M0.00,49.85 C46.05,-96.94 359.81,206.19 500.00,49.85 L500.00,149.60 L0.00,149.60 Z"
                  style="stroke: none; fill: #2c3e50"
                ></path>
              </svg>
            </div>
      </div>
    </section>

    <section>
      <div class="fild">
        <div class="container">
          <div class="row pt-5 position-relative">
           
            <div class="col-md-5">
              <div class="fild_image">
                <div class="fild_image-img1">
                  <img
                    src="<?= url('public/image/photo_2025-09-03_20-31-57.jpg') ?>"
                    class="fild_image-img1-1"
                    alt="عکس مدرسه"
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
                  <a href="<?= url('teacher/assignments') ?>" class="fild_box btn px-1">
                    <div class="fild_box-content">
                      <img
                        src="<?= url('public/image/assignment.png') ?>"
                        class="img-fuind"
                        alt="تکالیف"
                      />
                      <p>تکالیف</p>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-lg-4">
                  <a href="<?= url('teacher/medicine') ?>" class="fild_box btn px-1">
                    <div class="fild_box-content">
                      <img src="<?= url('public/image/medicine.png') ?>" class="img-fuind" alt="دارو" />
                      <p>دارو ها</p>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-lg-4">
                  <a href="" class="fild_box btn px-1">
                    <div class="fild_box-content">
                      <img src="<?= url('public/image/webinar.png') ?>" class="img-fuind" alt="فیلم های آموزشی" />
                      <p>فیلم های آموزشی</p>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-lg-4">
                  <a href="" class="fild_box btn px-1">
                    <div class="fild_box-content">
                      <img src="<?= url('public/image/test.png') ?>" class="img-fuind" alt="نمرات" />
                      <p>نمرات</p>
                    </div>
                  </a>
                </div>
               
                <div class="col-6 col-lg-4">
                  <a  href="index.html" class="fild_box btn px-1">
                    <div class="fild_box-content">
                      <img src="<?= url('public/image/active.png') ?>" class="img-fuind" alt="حضور و غیاب" />
                      <p>حضور و غیاب</p>
                    </div>
                  </a>
                </div>
              </div>
              <img src="<?= url('public/image/moon (1).png') ?>" class="fild_moon" alt="آیکن ماه" />
            </div>
            <img src="<?= url('public/image/fly.png') ?>" class="fild_fly" alt="عکس ستاره" />
          </div>
        </div>
      </div>
    </section>

  
<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/footer.php');
?>

  </body>
</html>
