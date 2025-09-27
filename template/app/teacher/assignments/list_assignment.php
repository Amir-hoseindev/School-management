<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/header.php');
?>
<title>لیست ثبت تمرین درس <?= $list_student[0]['assignment_subject'] ?></title>
<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/link.php');
?>
<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/menu.php');
?>

<section>
    <div class="teacher_movie-form">
        <div class="container mt-5">
            <h2 class="text-center my-2 teacher_movie-form-title">لیست ثبت تمرین درس  <?= $list_student[0]['assignment_subject'] ?> پایه <?= $list_student[0]['assignment_grade'] ?></h2>
            <h5 class="text-center my-2 teacher_movie-form-title">تمرین :  <?= $list_student[0]['assignment_title'] ?></h5>
            <?php
            $message = flash('assignment');
            if (!empty($message)) {
            ?>

                <div class="mb-2 alert alert-danger"> <small class="form-text text-danger">
                        <?= $message ?>
                    </small> </div>

            <?php
            } ?>
            <div class="row position-relative">
                <p class="fs-4 fw-bold text-end pill_title-list">
                    لیست وضعیت تمرین ها:
                </p>
                <div class="pill_table-responsive">
                    <table class="table pill_table-custom table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">دانش‌آموز</th>
                                <th class="text-center">تمرین ارسال شده</th>
                                <th class="text-center">تاریخ تحویل</th>
                                <th class="text-center">وضعیت</th>
                                <th class="text-center">ثبت نمره</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_student as $list) {
                            ?>
                                <tr>
                                    <td class="text-center"><?= $list['student_name'] . ' ' . $list['student_lastname'] ?></td>
                                    <td class="text-center">
                                        <?php
                                        if ($list['submitted_file']) {
                                        ?>
                                            <a href="<?= url($list['submitted_file']) ?>" download class="btn btn-custom btn-sm">دانلود کنید</a>
                                        <?php
                                        } else {
                                        ?>
                                            <p>هیچ فایلی ارسال نشده</p>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center"><?= $list['assignment_due_date'] ?></td>
                                    <td class="text-center">
                                        <?php
                                        if ($list['student_status']) {
                                            echo $list['student_status'];
                                        } else {
                                            echo 'تحویل داده نشده';
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <form action="<?= url('teacher/recordList_assignment') ?>" method="post" class="d-flex justify-content-center">
                                            <div class=" ms-2">
                                                <select name="score" id="" class="form-control">
                                                    <option>نمره را ثبت کنید</option>
                                                    <option <?= ($list['score'] == 1) ? 'selected' : ''; ?> value="1">بد</option>
                                                    <option <?= ($list['score'] == 2) ? 'selected' : ''; ?> value="2">نیاز به تلاش بیشتر</option>
                                                    <option <?= ($list['score'] == 3) ? 'selected' : ''; ?> value="3">خوب</option>
                                                    <option <?= ($list['score'] == 4) ? 'selected' : ''; ?> value="4">خیلی خوب</option>
                                                </select>
                                            </div>
                                            <input name="student_id" value="<?= $list['student_id'] ?>" class="d-none">
                                            <input name="assignment_id" value="<?= $list['assignment_id'] ?>" class="d-none">
                                            <button type="submit" class="btn btn-custom btn-sm">ثبت نمره</button>
                                        </form>
                                    </td>


                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <img src="<?= url('public/image/assignment (1).png') ?>" class="pill_img1" alt="عکس آیکن تمرین" />
            </div>
        </div>
    </div>
</section>

<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/footer.php');
?>

</body>

</html>