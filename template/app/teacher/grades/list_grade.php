<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/header.php');
?>
<title>لیست ثبت امتحان درس <?= $list_student[0]['grade_subject'] ?></title>
<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/link.php');
?>
<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/menu.php');
?>

<section>
    <div class="teacher_movie-form">
        <div class="container mt-5">
            <h2 class="text-center my-2 teacher_movie-form-title">لیست ثبت امتحان درس  <?= $list_student[0]['grade_subject'] ?> پایه <?= $list_student[0]['grade_grade'] ?></h2>
            <h5 class="text-center my-2 teacher_movie-form-title">امتحان :  <?= $list_student[0]['grade_title'] ?></h5>
            <?php
            $message = flash('grade');
            if (!empty($message)) {
            ?>

                <div class="mb-2 alert alert-danger"> <small class="form-text text-danger">
                        <?= $message ?>
                    </small> </div>

            <?php
            } ?>
            <div class="row position-relative">
                <p class="fs-4 fw-bold text-end pill_title-list">
                    لیست وضعیت امتحان ها:
                </p>
                <div class="pill_table-responsive">
                    <table class="table pill_table-custom table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">دانش‌آموز</th>
                                <th class="text-center">تاریخ امتحان</th>
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
                                  
                                    <td class="text-center"><?= $list['grade_date'] ?></td>
                                    <td class="text-center">
                                        <?= $list['grade_status'] ?>
                                    </td>
                                    <td class="text-center">
                                        <form action="<?= url('teacher/recordList_grades') ?>" method="post" class="d-flex justify-content-center">
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
                                            <input name="grade_id" value="<?= $list['grade_id'] ?>" class="d-none">
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