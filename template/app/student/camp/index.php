<?php
require_once(BASE_PATH . '/template/app/student/layouts/header.php');
?>
<title>اردوها</title>
<?php
require_once(BASE_PATH . '/template/app/student/layouts/link.php');
?>
<?php
require_once(BASE_PATH . '/template/app/student/layouts/menu.php');
?>
<section>
  <div class="student_film">
    <div class="container">
      <div class="row py-5">
        <h2 class="text-center mb-4">مدیریت اردوهای دانش‌آموز</h2>

        <?php
        foreach ($camps as $camp) {
        ?>


          <div class="col-md-6">
            <div class="camp-card">
              <img
                src="<?= url('public/image/' . $camp['image_path']) ?>"
                class="camp_card-img-top"
                alt="عکس اردو" />
              <div class="mt-3">
                <h4 class="camp-title"><?= $camp['title'] ?></h4>
                <p>
                  <strong>تاریخ:</strong>
                  <?= $camp['date'] ?>
                </p>
                <p>
                  <strong>زمان حرکت:</strong>
                  <?= $camp['time'] ?>
                </p>

                <p>
                  <strong>مکان:</strong>
                  <?= $camp['location'] ?>
                </p>
                <p>
                  <strong>برنامه روزانه:</strong>
                  <?= $camp['description'] ?>
                </p>
                <p>
                  <strong>وسایل موردنیاز:</strong>
                  <?= $camp['equipment'] ?>
                </p>
                <p><strong>هزینه:</strong> <?= $camp['cost'] ?> تومان</p>
                <p>
                  <strong>وضعیت ثبت‌نام:</strong>
                  <span class="text-warning"><?= $camp['status'] ?></span>
                </p>
                
                <p><strong>اطلاعات تماس:</strong>
                  <?= $camp['phone'] ?>
                </p>
                <p><strong>سرپرست :</strong><?= $camp['supervisor'] ?></p>
                <a
                  href="<?= url('public/PDF/camp/'.$camp['consent_from_path']) ?>"
                  download
                  class="btn btn-custom btn-sm">دانلود رضایت‌نامه</a>
              </div>
            </div>
          </div>

        <?php
        }
        ?>

      </div>
    </div>
  </div>
</section>

<?php
require_once(BASE_PATH . '/template/app/student/layouts/footer.php');
?>
</body>

</html>