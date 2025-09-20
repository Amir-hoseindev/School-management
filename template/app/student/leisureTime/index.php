<?php
require_once(BASE_PATH . '/template/app/student/layouts/header.php');
?>
<title>اوقات فراقت</title>
<?php
require_once(BASE_PATH . '/template/app/student/layouts/link.php');
?>
<?php
require_once(BASE_PATH . '/template/app/student/layouts/menu.php');
?>
<section>
    <div class="medicine">
        <div class="container-fluid">
            <div class="row d-flex align-items-center">
                <div class="col-md-7">
                    <div class="medicine_content">
                        <img
                            src="<?= url('public/image/shining.png') ?>"
                            class="medicine_content-img1"
                            alt="آیکن ستاره" />
                        <p class="fs-3 fs-xl-1 fs-lg-2  fw-bold text-center">اوقات فراغت فرزند شما</p>
                        <p class="fs-lg-5 text-center">
                            در این بخش، والدین گرامی می‌توانند برنامه‌های اوقات فراغت
                            فرزندشان را مشاهده کرده و در فعالیت‌ها مشارکت کنند. این
                            برنامه‌ها برای سرگرمی و یادگیری طراحی شده‌اند. 🎉
                        </p>
                        <p class="fs-lg-5 text-center">
                            - مشاهده فعالیت‌هایی مثل کاردستی، میان‌وعده، و بازی گروهی. -
                            دسترسی به جزئیات و مواد موردنیاز برای هر فعالیت. - اعلام حضور
                            یا ارسال بازخورد برای هماهنگی بیشتر. 📅
                        </p>
                        <p class="fs-lg-5 text-center">
                            لطفاً با فرزندتان در فعالیت‌ها همراهی کنید و به‌موقع اعلام
                            حضور کنید. 🙏
                        </p>
                        <p class="fs-lg-5 text-center">
                            <span class="fs-4 fw-bold"> نکات مهم: </span>
                            اطلاع‌رسانی تغییرات برنامه از طریق این بخش انجام می‌شود.
                        </p>
                        <img
                            src="<?= url('public/image/shining.png') ?>"
                            class="medicine_content-img2"
                            alt="آیکن ستاره" />
                        <img
                            src="<?= url('public/image/art.png') ?>"
                            class="parting_time-art"
                            alt="عکس هنر" />
                        <img
                            src="<?= url('public/image/sports.png') ?>"
                            class="parting_time-sports"
                            alt="عکس ورزش" />
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="medicine_image">
                        <div class="medicine_image-img">
                            <img
                                src="<?= url('public/image/photo_2025-09-03_20-31-55.jpg') ?>"
                                alt="عکس دانش‌آموزان" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="student_film">
        <div class="container">
            <div class="row py-5">


                <?php
                foreach ($leisureTimes as $leisureTime) {
                ?>

                    <div class="col-md-6">
                        <div class="camp-card">
                            <img
                                src="<?= url('public/image/' . $leisureTime['image_path']) ?>"
                                class="camp_card-img-top"
                                alt="عکس کوکی" />
                            <h4 class="camp-title"><?= $leisureTime['title'] ?></h4>
                            <p><strong>تاریخ:</strong> <?= $leisureTime['date'] ?></p>
                            <p>
                                <strong>توضیحات:</strong>
                                <?= $leisureTime['description'] ?>
                            </p>
                            <p>
                                <strong>وسایل موردنیاز:</strong> 
                                <?= $leisureTime['materials'] ?>
                            </p>
                          
                            
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