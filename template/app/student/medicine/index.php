<?php
require_once(BASE_PATH . '/template/app/student/layouts/header.php');
?>
<title>مدیریت داروها</title>
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
                            alt="عکس ستاره" />
                        <p class="fs-xl-1 fs-md-2 fs-3 fw-bold text-center">مدیریت دارو های فرزندتان</p>
                        <p class="fs-xl-4 fs-5 text-center">
                            <span class="fs-xl-3 fs-4 fw-bold">توضیح کوتاه:</span>
                            در این بخش می‌توانید لیست داروهای تجویز شده برای فرزندتان را
                            مدیریت کنید. با افزودن جزئیات، زمان‌بندی مصرف را تنظیم کرده و
                            از یادآوری‌ها استفاده کنید.
                        </p>
                        <p class="fs-xl-4 fs-5 text-center">
                            <span class="fs-xl-3 fs-4 fw-bold">دستور العمل:</span>
                            برای افزودن دارو، روی دکمه 'افزودن دارو' کلیک کنید و اطلاعات
                            شامل نام، دوز، و زمان مصرف را وارد کنید.
                        </p>
                        <img
                            src="<?= url('public/image/shining.png') ?>"
                            class="medicine_content-img2"
                            alt="عکس ستاره" />
                        <img
                            src="<?= url('public/image/medical.png') ?>"
                            class="medicine_content-img3"
                            alt="عکس دارو" />
                        <img
                            src="<?= url('public/image/medicine.png') ?>"
                            class="medicine_content-img4"
                            alt="عکس دارو" />
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="medicine_image">
                        <div class="medicine_image-img">
                            <img
                                src="<?= url('public/image/2d0c8721ca7a9dbc3a43979a274aceae.jpg') ?>"
                                alt="عکس دارو" />
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
                <p class="fs-4 fw-bold text-end pill_title-list">لیست داروها:</p>
                <div class="pill_table-responsive">
                    <table class="table pill_table-custom table-striped">
                        <thead>
                            <tr>
                                <th class="fs-5 text-center">نام دارو</th>
                                <th class="fs-5 text-center">دوز دارو</th>
                                <th class="fs-5 text-center">زمان مصرف</th>
                                <th class="fs-5 text-center">روز مصرف</th>
                                <th class="fs-5 text-center">یادداشت</th>
                                <th class="fs-5 text-center">وضعیت</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php
                            foreach ($medicines as $medicine) {
                            ?>

                                <tr>

                                    <td class="fs-5 text-center"><?= $medicine['name'] ?></td>
                                    <td class="fs-5 text-center"><?= $medicine['dosage'] ?></td>
                                    <td class="fs-5 text-center"><?= $medicine['schedule'] ?></td>
                                    <td class="fs-5 text-center"><?php
                                    if ($medicine['date']) {
                                        echo $medicine['date'] ;
                                    }else if($medicine['every_day'] == 3){
                                        echo 'هرروز' ;
                                    }else{
                                        echo 'نامشخص';
                                    }
                                    ?></td>
                                    <td class="fs-5 text-center"><?= $medicine['notes'] ?></td>
                                    <td class="fs-5 text-center"><?= $medicine['status'] ?></td>
                                </tr>

                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <img src="<?= url('public/image/pill.png') ?>" class="pill_img1" alt="عکس قرص" />
            </div>
            <div class="row position-relative">
                <div class="pill_form-container">
                    <h3 class="text-center mb-4">افزودن دارو جدید</h3>
                    <form id="medicationForm" action="<?= url('student/medicine_stor') ?>" method="post">
                        <div class="mb-3">
                            <label for="drugName" class="pill_form-label">نام دارو</label>
                            <input
                                hidden
                                value="<?= $student['academic_year_id'] ?>"
                                name="academic_year_id"
                                 />
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                placeholder="مثال: استامینوفن"
                                required />
                        </div>
                        <div class="mb-3">
                            <label for="dosage" class="pill_form-label">دوز (میلی‌گرم)</label>
                            <input
                                type="text"
                                class="form-control"
                                id="dosage"
                                name="dosage"
                                placeholder="مثال: 500"
                                required />
                        </div>
                        <div class="mb-3">
                            <label for="schedule" class="pill_form-label">زمان‌بندی مصرف</label>
                            <input
                                type="time"
                                class="form-control"
                                id="schedule"
                                name="schedule"
                                placeholder="مثال: صبح و شب"
                                required />
                        </div>
                        <div class="mb-3">
                            <label class="pill_form-label">روزهای مصرف</label>
                            <div class="d-flex flex-wrap gap-2 mb-2">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="every_day">
                                    <label class="form-check-label" for="day_saturday">هرروز</label>
                                </div>
                                <div class="form-check">
                                    <input type="date" class="form-check-input" name="date">
                                    <label class="form-check-label" for="day_saturday">انتخاب روز مصرف دارو</label>
                                </div>
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="notes" class="pill_form-label">یادداشت (اختیاری)</label>
                            <textarea
                                class="form-control"
                                id="notes"
                                name="notes"
                                rows="3"
                                placeholder="مثال: با معده خالی مصرف نشود"></textarea>
                        </div>
                        <button type="submit" class="btn pill_btn-custom w-100">افزودن دارو</button>
                    </form>


                </div>
                <img src="<?= url('public/image/medical.png') ?>" class="pill_img2" alt="عکس دارو" />
                <img src="<?= url('public/image/medicine.png') ?>" class="pill_img3" alt="عکس دارو" />
            </div>
        </div>
    </div>
</section>

<?php
require_once(BASE_PATH . '/template/app/student/layouts/footer.php');
?>

</body>

</html>