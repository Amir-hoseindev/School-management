<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/header.php');
?>
<title>تکالیف درس <?= $assignments[0]['assignment_subject'] ?></title>
<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/link.php');
?>
<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/menu.php');
?>

<section>
    <div class="teacher_assignments">
        <!-- لیست تکالیف -->
        <div class="container">
            <div class="row my-5">
                <?php
                foreach ($assignments as $assignment) {
                ?>

                    <div class="col-xl-3 col-lg-4 gy-4">
                        <div class="teacher_assignments-card d-md-block d-flex flex-column justify-content-center ">
                            <h4 class="teacher_assignments-title"><?= $assignment['assignment_title'] ?></h4>
                            <p><span class="fw.-bold">تاریخ تحویل:</span><?= $assignment['assignment_due_date'] ?></p>
                            <p><span class="fw.-bold">تاریخ انتشار:</span><?= $assignment['assignment_publish_date'] ?></p>
                            <p><span class="fw-bold">درس:</span><?= $assignment['assignment_subject'] ?></p>
                            <p>
                                <span class="fw-bold">توضیحات:</span><?= $assignment['assignment_description'] ?>
                            </p>
                            <div class="mt-2">
                                <a href="<?= url('teacher/editAssignment/' . $assignment['assignment_id']) ?>" class="btn btn-custom btn-sm me-2">ویرایش</a>
                                <a href="<?= url('teacher/list_assignment/'. $assignment['assignment_id']) ?>" class="btn btn-custom btn-sm">ثبت تمرین برای دانش آموز</a>
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

<section>
    <div class="teacher_movie-form">
        <div class="container mt-5">
            <div class="row position-relative">
                <p class="fs-4 fw-bold text-end pill_title-list">
                    لیست وضعیت تمرین های درس <?= $assignments[0]['assignment_subject'] ?>:
                </p>
                <div class="pill_table-responsive">
                    <table class="table pill_table-custom table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">دانش‌آموز</th>
                                <th class="text-center">تعداد تمرین</th>
                                <th class="text-center">تمرین انجام شده</th>
                                <th class="text-center">نمره تمرین تا الان</th>
                                <th class="text-center">جزئیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($students as $student) { ?>
                                <tr>
                                    <td class="text-center"><?= $student['student_name'] . ' ' . $student['student_lastname'] ?></td>
                                    <td class="text-center">
                                        <p><?= $student['total_assignments'] ?> تمرین</p>
                                    </td>
                                    <td class="text-center">
                                        <p><?= $student['completed_assignments'] ?> تمرین انجام شده</p>
                                    </td>
                                    <td class="text-center">
                                        <p>
                                            <?php
                                            if ($student['average_score'] == 1) {
                                                echo "بد";
                                            } elseif ($student['average_score'] == 2) {
                                                echo "نیاز به تلاش بیشتر";
                                            } elseif ($student['average_score'] == 3) {
                                                echo "خوب";
                                            } elseif ($student['average_score'] == 4) {
                                                echo "خیلی خوب";
                                            }
                                            ?>
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= url('teacher/studentList_assignment/'.$student['student_id'].'/'.$student['assign_id']) ?>" class="btn btn-custom btn-sm">مشاهده</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <h2 class="text-center my-2 teacher_movie-form-title">اضافه کردن تمرین جدید</h2>

            <!-- فرم آپلود ویدیو -->
            <div class="row position-relative">
                <img src="<?= url('public/image/assignment (1).png') ?>" class="teacher_movie-form-car" alt="تمرین" />
                <img
                    src="<?= url('public/image/curved-arrow-with-broken-line.png') ?>"
                    class="teacher_movie-form-line1"
                    alt="تمرین" />

                <div class="pill_form-container">
                    <h5 class="mb-3">آپلود تمرین جدید</h5>
                    <form action="<?= url('teacher/submit_assignment') ?>" method="post" enctype="multipart/form-data">
                        <?php
                        $message = flash('assignment');
                        if (!empty($message)) {
                        ?>

                            <div class="mb-2 alert alert-danger"> <small class="form-text text-danger">
                                    <?= $message ?>
                                </small> </div>

                        <?php
                        } ?>
                        <div class="mb-3">
                            <label for="drugName" class="pill_form-label">عنوان تمرین</label>
                            <input
                                name="title"
                                type="text"
                                class="form-control"
                                id="drugName"
                                placeholder="مثال: ریاضی"
                                required />
                        </div>
                        <div class="mb-3">
                            <label for="drugName" class="pill_form-label">تازیخ تحویل تمرین</label>
                            <input
                                name="due_date"
                                type="date"
                                class="form-control"
                                id="drugName"
                                required />
                            <input
                                name="grade"
                                class="d-none"
                                value="<?= $assignments[0]['assignment_grade'] ?>"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="dosage" class="pill_form-label">انتخاب درس</label>
                            <select name="subject" id="" class="form-control">
                                <?php
                                foreach ($subjects as $subject) {
                                ?>
                                    <option value="<?= $subject['subject'] ?>" <?= ($assignments[0]['assignment_subject'] == $subject['subject']) ? 'selected' : ''; ?>><?= $subject['subject'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="schedule" class="pill_form-label">عکس تمرین خود را انتخاب کنید</label>
                            <input
                            name="file_path"
                                type="file"
                                class="form-control"
                             />
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="pill_form-label">توضیحات </label>
                            <textarea
                                name="description"
                                class="form-control"
                                id="notes"
                                rows="3"
                                placeholder="مثال:  نگارش انشای 200 کلمه‌ای."></textarea>
                        </div>
                        <button type="submit" class="btn pill_btn-custom w-100">
                            اضافه کردن تمرین
                        </button>
                    </form>
                </div>
                <img
                    src="<?= url('public/image/rotated-right-arrow-with-broken-line.png') ?>"
                    class="teacher_movie-form-line2"
                    alt="عکس خط" />
                <img
                    src="<?= url('public/image/assignment (2).png') ?>"
                    class="teacher_movie-form-movie1"
                    alt="عکس تمرین" />
            </div>
        </div>
    </div>
</section>

<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/footer.php');
?>

</body>

</html>