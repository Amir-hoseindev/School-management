<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/header.php');
?>
<title>ویرایش تمرین <?= $assignment['title'] ?></title>
<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/link.php');
?>
<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/menu.php');
?>

<section>
    <div class="teacher_movie-form">
        <div class="container mt-5">
            <h2 class="text-center mb-4 teacher_movie-form-title">
                ویرایش تمرین
            </h2>

            <!-- فرم آپلود ویدیو -->
            <div class="row position-relative">
                <img src="<?= url('public/image/assignment (2).png') ?>" class="teacher_movie-form-car" alt="عکس آیکن تمرین" />
                <img
                    src="<?= url('public/image/curved-arrow-with-broken-line.png') ?>"
                    class="teacher_movie-form-line1"
                    alt="عکس آیکن تمرین" />

                <div class="pill_form-container">
                    <h5 class="mb-3">ویرایش تمرین</h5>
                    <form action="<?= url('teacher/recordEditAssignment') ?>" method="post" enctype="multipart/form-data">
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
                                name="id"
                                value="<?= $assignment['id'] ?>"
                                class="d-none" />
                            <input
                                name="title"
                                type="text"
                                class="form-control"
                                id="drugName"
                                value="<?= $assignment['title'] ?>"
                                required />
                        </div>
                        <div class="mb-3">
                            <label for="drugName" class="pill_form-label">تازیخ تحویل تمرین</label>
                            <input
                                name="due_date"
                                type="date"
                                class="form-control"
                                id="drugName"
                                value="<?= $assignment['due_date'] ?>"
                                required />
                        </div>
                        <div class="mb-3">
                            <label for="dosage" class="pill_form-label">انتخاب درس</label>
                            <select name="subject" id="" class="form-control" required>
                                <?php
                                foreach ($teacher_subject as $ts) {
                                ?>
                                    <option value="<?= $ts['subject'] ?>" <?= ($ts['subject'] == $assignment['subject']) ? 'selected' : ''; ?>><?= $ts['subject'] ?></option>
                                <?php
                                }
                                ?>


                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="schedule" class="pill_form-label">عکس تمرین خود را انتخاب کنید</label>
                            <input
                                type="file"
                                class="form-control"
                                accept="video/*" />
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="pill_form-label">توضیحات </label>
                            <textarea
                                name="description"
                                class="form-control"
                                id="notes"
                                rows="3"
                                required><?= $assignment['description'] ?></textarea>
                        </div>
                        <button type="submit" class="btn pill_btn-custom w-100">
                            ثبت ویرایش
                        </button>
                    </form>
                </div>
                <img
                    src="<?= url('public/image/rotated-right-arrow-with-broken-line.png') ?>"
                    class="teacher_movie-form-line2"
                    alt="عکس آیکن تمرین" />
                <img
                    src="<?= url('public/image/assignment (1).png') ?>"
                    class="teacher_movie-form-movie1"
                    alt="عکس آیکن تمرین" />
            </div>
        </div>
    </div>
</section>

<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/footer.php');
?>

</body>

</html>