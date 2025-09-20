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
    <div class="teacher_assignments">
        <!-- لیست تکالیف -->
        <div class="container">
            <div class="row my-5" dir="rtl">
                <?php
                foreach ($assignments as $assignment) {
                ?>


                    <div class="col-xl-3 col-lg-4 gy-4">
                        <div class="teacher_assignments-card d-md-block d-flex flex-column justify-content-center ">
                            <h4 class="teacher_assignments-title"><?= $assignment['title'] ?></h4>
                            <p><span class="fw.-bold">تاریخ ثبت تمرین:</span> <?= $assignment['publish_date'] ?></p>
                            <p><span class="fw.-bold">تاریخ تحویل تمرین:</span> <?= $assignment['due_date'] ?></p>
                            <p><span class="fw-bold">درس:</span><?= $assignment['subject'] ?></p>
                            <p>
                                <span class="fw-bold">توضیحات:</span><?= $assignment['description'] ?>
                            </p>


                            <div class="mt-2">


                                <form method="POST" action="<?= url('student/submit_assignment') ?>" enctype="multipart/form-data" class="d-inline" id="assignment-form-<?= $assignment['id'] ?>">
                                    <input type="hidden" name="assignment_id" value="<?= $assignment['id'] ?>">
                                    <input type="hidden" name="student_id" value="<?= $_SESSION['student'] ?>">
                                    <input type="file" name="submitted_file" id="file-input-<?= $assignment['id'] ?>" class="d-none" accept=".pdf,.doc,.docx,.jpg,.png" required>
                                    <button type="button" class="btn btn-custom btn-sm" onclick="triggerFileUpload(<?= $assignment['id'] ?>)">ارسال تمرین</button>
                                </form>
                                <?php if ($assignment['file_path']) { ?>
                                    <a href="<?= url('public/PDF/assignment/' . $assignment['file_path']) ?>" download class="btn btn-custom btn-sm me-2">دانلود</a>
                                <?php } ?>

                            </div>

                            <?php
                            if ($assignment['status']) {
                            ?>

                                <p class="m-0 pt-3 fw-bold text-success"> تمرین <?= $assignment['status'] ?></p>
                            <?php
                            } else {
                            ?>

                                <p class="m-0 pt-3 text-danger fw-bold">در انتظار ارسال تمرین</p>
                            <?php
                            }
                            ?>

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
                    لیست وضعیت تمرین های فرزندتان:
                </p>
                <div class="pill_table-responsive">
                    <table class="table pill_table-custom table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">ردیف</th>
                                <th class="text-center">درس</th>
                                <th class="text-center">تمرین</th>
                                <th class="text-center">وضعیت</th>
                                <th class="text-center">نمره</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php
                            $count = 0;
                            foreach ($assignmentST as $ST) {

                                $count++;
                            ?>

                                <tr>
                                    <td class="text-center"><?= $count ?></td>
                                    <td class="text-center">
                                        <p><?= $ST['subject'] ?></p>
                                    </td>
                                    <td class="text-center">
                                        <p><?= $ST['title'] ?></p>
                                    </td>
                                    <td class="text-center">
                                        <p>
                                            <?php
                                            if ($ST['status']) {
                                                echo ' تمرین ' . $ST['status'];
                                            } else {
                                                echo "تمرین تحویل داده نشده";
                                            }
                                            ?>
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <p>
                                            <?php
                                            if ($ST['score']) {
                                                echo $ST['score'];
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </p>
                                    </td>
                                </tr>
                            <?php

                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</section>


<?php
require_once(BASE_PATH . '/template/app/student/layouts/footer.php');
?>
<script src="<?= url('public/js/assignmentDetail.js') ?>"></script>
</body>

</html>