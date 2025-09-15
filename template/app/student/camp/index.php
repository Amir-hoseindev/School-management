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

            <div class="col-md-6">
              <div class="camp-card">
                <img
                  src="<?= url('public/image/bee8d8cf83f9d3871ef3984c1959151c.jpg') ?>"
                  class="camp_card-img-top"
                  alt="عکس اردو"
                />
                <div class="mt-3">
                  <h4 class="camp-title">اردوی تفریحی طبیعت‌گردی</h4>
                  <p>
                    <strong>تاریخ و زمان:</strong> 10-12 مهر 1404 (8 صبح تا 5
                    عصر)
                  </p>
                  <p><strong>مکان:</strong> آبشار بیشه لرستان</p>
                  <p>
                    <strong>برنامه روزانه:</strong> بازدید از جنگل، بازی‌های
                    گروهی، کمپینگ
                  </p>
                  <p>
                    <strong>وسایل موردنیاز:</strong> کوله‌پشتی، لباس گرم، دفترچه
                    بیمه
                  </p>
                  <p><strong>هزینه:</strong> 500,000 تومان</p>
                  <p>
                    <strong>وضعیت ثبت‌نام:</strong>
                    <span class="text-warning">در انتظار تأیید</span>
                  </p>
                  <a
                    href="documents/consent-form.pdf"
                    download
                    class="btn btn-custom btn-sm"
                    >دانلود رضایت‌نامه</a
                  >
                  <p><strong>اطلاعات تماس:</strong> 09123456789</p>
                  <p><strong>سرپرست :</strong> سعید مینایی</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="camp-card">
                <img
                  src="<?= url('public/image/7293797a35e79643b9c10b99344766d6.jpg') ?>"
                  class="camp_card-img-top"
                  alt="عکس اردو"
                />
                <div class="mt-3">
                  <h4 class="camp-title">اردوی تفریحی طبیعت‌گردی</h4>
                  <p>
                    <strong>تاریخ و زمان:</strong> 10-12 مهر 1404 (8 صبح تا 5
                    عصر)
                  </p>
                  <p><strong>مکان:</strong> پارک ملی گلستان</p>
                  <p>
                    <strong>برنامه روزانه:</strong> بازدید از جنگل، بازی‌های
                    گروهی، کمپینگ
                  </p>
                  <p>
                    <strong>وسایل موردنیاز:</strong> کوله‌پشتی، لباس گرم، دفترچه
                    بیمه
                  </p>
                  <p><strong>هزینه:</strong> 500,000 تومان</p>
                  <p>
                    <strong>وضعیت ثبت‌نام:</strong>
                    <span class="text-warning">در انتظار تأیید</span>
                  </p>
                  <a
                    href="documents/consent-form.pdf"
                    download
                    class="btn btn-custom btn-sm"
                    >دانلود رضایت‌نامه</a
                  >
                  <p><strong>اطلاعات تماس:</strong> 09123456789</p>
                  <p><strong>سرپرست :</strong> سعید مینایی</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  <?php
require_once(BASE_PATH . '/template/app/student/layouts/footer.php');
?>
  </body>
</html>
