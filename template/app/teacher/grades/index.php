<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/header.php');
?>
<title>مدیریت نمرات</title>
<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/link.php');
?>
<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/menu.php');
?>

<section>
  <div class="teacher_movie">
    <div class="container-fluid">
      <div class="row d-flex align-items-center">
        <div class="col-md-7 position-relative">
          <div class="medicine_content">
            <img
              src="<?= url('public/image/shining.png') ?>"
              class="medicine_content-img1"
              alt="آیکن ستاره" />
            <p class="fs-lg-1 fs-2 fw-bold text-center">مدیریت نمرات</p>
            <p class="fs-xl-4 fs-5 text-center px-5">
              در این بخش، معلمان می‌توانند نمرات دانش‌آموزان را آپلود کرده و
              نمرات ثبت‌شده قبلی را مشاهده و ویرایش کنند. این اطلاعات برای
              پیگیری پیشرفت تحصیلی حیاتی است. 📝
            </p>
            <p class="fs-xl-4 fs-5 text-center">
              لطفاً اطلاعات را با دقت وارد کنید و پس از تأیید ذخیره کنید. 🙏
            </p>
            <p class="fs-xl-4 fs-5 text-center">
              <span class="fs-xl-3 fs-4 fw-bold"> نکات مهم: </span>
              تغییرات نمرات پس از تأیید مدیر ذخیره می‌شود.
            </p>
            <img
              src="<?= url('public/image/shining.png') ?>"
              class="medicine_content-img2"
              alt="آیکن ستاره" />
            <img
              src="<?= url('public/image/checklist.png') ?>"
              class="teacher_movie-icon-school"
              alt="آیکن مدرسه" />
            <img
              src="<?= url('public/image/contract.png') ?>"
              class="teacher_movie-icon-movie"
              alt="آیکن فیلم" />
          </div>
        </div>

        <div class="col-md-5">
          <div class="medicine_image">
            <div class="medicine_image-img">
              <img src="<?= url('public/image/photo_2025-08-30_17-45-35.jpg') ?>" alt="عکس کلاس" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="attendance">
    <div class="container">
      <div class="row mt-p">


        <!-- تب‌ها برای روش‌ها -->
        <ul class="nav nav-tabs mb-4 attendance_direction">
          <?php
          // گروه‌بندی داده‌ها بر اساس grade
          $teacher_subjects_grouped = [];
          foreach ($teacher_subjects as $row) {
            $grade = $row['grade'];
            $teacher_subjects_grouped[$grade][] = [
              'grade_id' => $row['teacher_subject_grade_id'],
              'subject_id' => $row['teacher_subject_id'],
              'subject' => $row['teacher_subject'],
              'image'   => $row['subject_image']
            ];
          }
          $i = 0;
          foreach ($teacher_subjects_grouped as $grade => $subjects) {
            $i++;
          ?>
            <li class="nav-item px-1">
              <a class="nav-link px-4  fs-4 fw-bold <?= $i == 1 ? 'active' : '' ?>"
                href="#tab-<?= $grade ?>"
                data-bs-toggle="tab">
                کلاس <?= $grade ?>
              </a>
            </li>
          <?php } ?>
        </ul>

        <div class="tab-content">
          <?php
          $i = 0;
          foreach ($teacher_subjects_grouped as $grade => $subjects) {
            $i++;
          ?>
            <div id="tab-<?= $grade ?>"
              class="tab-pane fade <?= $i == 1 ? 'show active' : '' ?>">
              <section>
                <div class="teacher_movie py-2">
                  <div class="container">
                    <div class="row g-2 position-relative">
                      <img src="<?= url('public/image/moon (1).png') ?>" class="teacher_movie-moon1" alt="عکس ماه" />

                      <?php foreach ($subjects as $subject) { ?>

                        <div class="col-6 col-lg-4">
                          <a href="<?= url('teacher/gradesDetail/' . $subject['grade_id'] . '/' . $subject['subject_id']) ?>" class="fild_box btn px-1">
                            <div class="fild_box-content">
                              <img src="<?= url('public/image/' . $subject['image']) ?>"
                                class="img-fuind"
                                alt="<?= $subject['subject'] ?>" />
                              <p><?= $subject['subject'] ?></p>
                            </div>
                          </a>
                        </div>
                      <?php } ?>

                    </div>
                  </div>
                </div>
              </section>
            </div>
          <?php } ?>
        </div>




      </div>
    </div>
  </div>
</section>

<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/footer.php');
?>


</body>

</html>