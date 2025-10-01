<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/header.php');
?>
<title>ویرایش پروفایل</title>
<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/link.php');
?>
<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/menu.php');
?>
<div class="container mt-5">
    <div class="row">
        <h2 class="text-center mb-4 text-light">ویرایش پروفایل</h2>
        <p class="text-center mb-4 text-light" dir="rtl">
            در این بخش می‌توانید اطلاعات شخصی خود را به‌روز کنید. لطفاً تغییرات را
            با دقت ذخیره کنید.
        </p>
        <div class="student_profile">
            <img
                src="<?= url($teacher['profile_image']) ?>"
                alt="عکس پروفایل"
                class="" />
        </div>
        <p class="text-center text-danger mb-4" dir="rtl">
            📌 نکات مهم: اطلاعات تغییر یافته پس از تأیید ذخیره می‌شود.
        </p>
        <div class="pill_form-container">
            <h5 class="mb-3">ویرایش پروفایل</h5>
            <form action="<?= url('teacher/profileStoreTch') ?>" method="post" enctype="multipart/form-data">
                <?php
                $message = flash('register_error');
                if (!empty($message)) {
                ?>

                    <div class="mb-2 alert alert-danger"> <small class="form-text text-danger">
                            <?= $message ?>
                        </small> </div>

                <?php
                } ?>
                <div class="mb-3">
                    <label for="drugName" class="pill_form-label">نام</label>
                    <input
                        type="text"
                        class="form-control"
                        id="drugName"
                        name="name"
                        value="<?= $teacher['name'] ?>"
                        required />
                </div>
                <div class="mb-3">
                    <label for="drugName" class="pill_form-label">نام خانوادگی</label>
                    <input
                        type="text"
                        class="form-control"
                        id="drugName"
                        name="last_name"
                        value="<?= $teacher['last_name'] ?>"
                        required />
                </div>
                <div class="mb-3">
                    <label for="drugName" class="pill_form-label">کد ملی معلم</label>
                    <input
                        type="number"
                        class="form-control"
                        name="national_id"
                        id="drugName"
                        value="<?= $teacher['national_id'] ?>"
                        required />
                </div>

                <div class="mb-3">
                    <label for="schedule" class="pill_form-label">تصویر خودتان را واردکنید</label>
                    <input type="file" class="form-control" name="profile_image" required value="<?= $teacher['profile_image'] ?>" />
                </div>
                <div class="mb-3">
                    <label for="drugName" class="pill_form-label">شماره تماس</label>
                    <input
                        type="number"
                        class="form-control"
                        id="drugName"
                        name="phone"
                        value="<?= $teacher['phone'] ?>"
                        required />
                </div>
                <div class="mb-3">
                    <label for="drugName" class="pill_form-label">رمز عبور</label>
                    <input
                        type="text"
                        class="form-control"
                        id="drugName"
                        name="password"
                        placeholder="مثال: Omid6925"
                        required />
                </div>

                <button type="submit" class="btn pill_btn-custom w-100">
                    ارسال
                </button>
            </form>
        </div>
    </div>
</div>
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
                            'id' => $row['id'],
                            'subject' => $row['subject']
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
                            <div class="pill_form-container">
                                <h5 class="mb-3">انتخاب درس هایی که تدریس میکنید</h5>
                                <form action="<?= url('teacher/profileAdd_subject') ?>" method="post">
                                    <?php
                                    $message = flash('subject');
                                    if (!empty($message)) {
                                    ?>
                                        <div class="mb-2 alert alert-danger">
                                            <small class="form-text text-danger">
                                                <?= $message ?>
                                            </small>
                                        </div>
                                    <?php
                                    }
                                    foreach ($subjects as $subject) {
                                    ?>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                id="inlineCheckbox2"
                                                name="<?= $subject['id'] ?>"
                                                value="<?= $subject['id'] ?>" />
                                            <label class="form-check-label" for="inlineCheckbox2"><?= $subject['subject'] ?></label>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <button type="submit" class="btn pill_btn-custom w-100">
                                        ارسال
                                    </button>
                                </form>
                            </div>




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