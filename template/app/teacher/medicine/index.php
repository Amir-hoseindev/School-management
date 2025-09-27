<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/header.php');
?>
<title>لیست داروهای دانش‌آموزان</title>
<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/link.php');
?>
<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/menu.php');
?>

<section>
    <div class="teacher_medicine">
        <div class="container-fluid">
            <div class="row d-flex align-items-center">
                <div class="col-md-7">
                    <div class="medicine_content">
                        <img
                            src="<?= url('public/image/shining.png') ?>"
                            class="medicine_content-img1"
                            alt="آیکن ستاره" />
                        <p class="fs-lg-1 fs-2 fw-bold text-center">مدیریت اطلاعات دارویی</p>
                        <p class="fs-xl-4 fs-5 text-center">
                            در این بخش، معلمان می‌توانند اطلاعات دارویی دانش‌آموزان را
                            ثبت، مشاهده و به‌روزرسانی کنند. این اطلاعات برای اطمینان از
                            سلامت دانش‌آموزان در طول روز مدرسه حیاتی است. 💊
                        </p>
                        <p class="fs-xl-4 fs-5 text-center">
                            <span class="fs-xl-3 fs-4 fw-bold">نکات مهم: </span>
                            اطلاعات پزشکی محرمانه است و فقط برای استفاده رسمی مجاز است.
                        </p>
                        <img
                            src="<?= url('public/image/shining.png') ?>"
                            class="medicine_content-img2"
                            alt="آیکن ستاره" />
                        <img
                            src="<?= url('public/image/medical.png') ?>"
                            class="medicine_content-img3"
                            alt="آیکن دارو" />
                        <img
                            src="<?= url('public/image/medicine.png') ?>"
                            class="medicine_content-img4"
                            alt="آیکن دارو" />
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="medicine_image">
                        <div class="medicine_image-img">
                            <img
                                src="<?= url('public/image/2d0c8721ca7a9dbc3a43979a274aceae.jpg') ?>"
                                alt="عکس داروها" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="pill">
        <div class="container mt-5">
            <div class="row position-relative">
                <p class="fs-4 fw-bold text-end pill_title-list">لیست داروهای دانش‌آموزان پایه <?= $medicines[0]['student_grade'] ?> :</p>
                <div class="pill_table-responsive">
                    <table class="table pill_table-custom table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">اطلاعات دانش‌آموز</th>
                                <th class="text-center">اطلاعات دارو</th>
                                <th class="text-center">زمان مصرف</th>
                                <th class="text-center">تاریخ مصرف</th>
                                <th class="text-center">یادداشت</th>
                                <th class="text-center">وضعیت</th>
                                <th class="text-center">ثبت کردن</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($medicines as $medicine) {
                                ?>
                                <tr>
                                <td class="text-center">
                                    <p><?= $medicine['student_name']. $medicine['student_lastname'] ?></p>
                                </td>

                                <td class="text-center">
                                    <p><?= $medicine['medication_name'] ?></p>
                                    <p><?= $medicine['dosage'] ?></p>
                                </td>
                                <td class="text-center"><?= $medicine['schedule'] ?></td>
                                <td class="text-center">
                                    <?php
                                    if ($medicine['medication_date']) {
                                        echo $medicine['medication_date'];
                                    }else {
                                        echo 'هرروز';
                                    }
                                    ?>
                                </td>
                                <td class="text-center"><?= $medicine['notes'] ?></td>
                                <td class="text-center"><?= $medicine['status'] ?></td>
                                <td class="text-center">
                                    <a href="<?= url('teacher/medicine_stor/'.$medicine['medication_id']) ?>" class="btn btn-custom btn-sm me-2">مصرف شد</a>
                                </td>
                            </tr>
                                <?php
                            }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
                <img src="<?= url('public/image/pill.png') ?>" class="pill_img1" alt="آیکن قرص" />
            </div>
        </div>
    </div>
</section>
<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/footer.php');
?>

</body>

</html>