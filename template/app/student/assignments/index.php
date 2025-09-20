<?php
require_once(BASE_PATH . '/template/app/student/layouts/header.php');
?>
<title>تکالیف</title>
<?php
require_once(BASE_PATH . '/template/app/student/layouts/link.php');
?>
<?php
require_once(BASE_PATH . '/template/app/student/layouts/menu.php');
?>

<section>
    <div class="teacher_assignment">
        <div class="container-fluid">
            <div class="row d-flex align-items-center">
                <div class="col-md-7 position-relative">
                    <div class="medicine_content">
                        <img
                            src="<?= url('public/image/shining.png') ?>"
                            class="medicine_content-img1"
                            alt="عکس ستاره" />
                        <p class="fs-1 fw-bold text-center">بررسی تکالیف فرزندتان</p>
                        <p class="fs-4 text-center px-5">
                            در این بخش می‌توانید تکالیف فرزندتان را مشاهده، مدیریت کنید. اطلاعات به‌روز برای پیگیری بهتر ارائه می‌شود.
                        </p>

                        <p class="fs-4 text-center">
                            <span class="fs-3 fw-bold">📌 نکات مهم: </span> لطفاً به تاریخ
                            تحویل تمرین دقت کنید
                        </p>

                        <img
                            src="<?= url('public/image/shining.png') ?>"
                            class="medicine_content-img2"
                            alt="عکس ستاره" />
                        <img
                            src="<?= url('public/image/rotated-right-arrow-with-broken-line.png') ?>"
                            class="teacher_assignment-icon-line"
                            alt="عکس خط" />
                        <img
                            src="<?= url('public/image/assignment (1).png') ?>"
                            class="teacher_assignment-icon-assignment1"
                            alt="عکس تمارین" />
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="medicine_image">
                        <div class="medicine_image-img">
                            <img
                                src="<?= url('public/image/photo_2025-09-03_20-31-57.jpg') ?>"
                                alt="عکس دانش‌آموزان" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="teacher_movie py-2">
        <div class="container">
            <div class="row g-2 position-relative">
                <img
                    src="<?= url('public/image/moon (1).png') ?>"
                    class="teacher_movie-moon1"
                    alt="عکس ماه" />


                <?php
                foreach ($grades as $grade) {
                ?>


                    <div class="col-6 col-lg-4">
                        <a href="<?= url('student/assignmentDetail/' . $grade['id']) ?>" class="fild_box btn px-1">
                            <div class="fild_box-content">
                                <img src="<?= url('public/image/' . $grade['image_path']) ?>" class="img-fuind" alt="عکس <?= $grade['subject'] ?>" />
                                <p><?= $grade['subject'] ?></p>
                            </div>
                        </a>
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