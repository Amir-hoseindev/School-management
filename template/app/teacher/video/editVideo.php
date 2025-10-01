<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/header.php');
?>
<title>فیلم آموزشی درس فارسی</title>
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
                ویرایش فیلم آموزشی درس <?= $video['subject'] ?> پایه ی <?= $video['grade'] ?>
            </h2>

            <!-- فرم آپلود ویدیو -->
            <div class="row position-relative">
                <img src="<?= url('public/image/car.png') ?>" class="teacher_movie-form-car" alt="آیکن ماشین" />
                <img src="<?= url('public/image/curved-arrow-with-broken-line.png') ?>" class="teacher_movie-form-line1" alt="آیکن خط" />

                <div class="pill_form-container">
                    <h5 class="mb-3">ویرایش ویدیو</h5>
                    <form action="<?= url('teacher/recordEditVideo') ?>" method="post" enctype="multipart/form-data">
                        <?php
                        $message = flash('video');
                        if (!empty($message)) {
                        ?>

                            <div class="mb-2 alert alert-danger"> <small class="form-text text-danger">
                                    <?= $message ?>
                                </small> </div>

                        <?php
                        } ?>
                        <div class="mb-3">
                            <label for="drugName" class="pill_form-label">عنوان ویدیو</label>
                            <input
                                type="text"
                                class="form-control"
                                name="title"
                                value="<?= $video['title'] ?>"
                                placeholder="مثال: ریاضی"
                                required />
                            <input
                                name="id"
                                class="d-none"
                                value="<?= $video['id'] ?>" />
                        </div>
                        <div class="mb-3">
                            <label for="dosage" class="pill_form-label">انتخاب درس</label>
                            <select name="subject" id="" class="form-control">
                                <?php
                                foreach ($teacher_subject as $ts) {
                                ?>
                                    <option value="<?= $ts['subject'] ?>" <?= ($ts['subject'] == $video['subject']) ? 'selected' : ''; ?>><?= $ts['subject'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="schedule" class="pill_form-label">ویدیو را انتخاب کنید</label>
                            <input
                                type="file"
                                class="form-control"
                                accept="video/*"
                                name="video_path"
                                required />
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="pill_form-label">توضیحات </label>
                            <textarea
                                class="form-control"
                                id="notes"
                                rows="3"
                                name="description"><?= $video['description'] ?></textarea>
                        </div>
                        <button type="submit" class="btn pill_btn-custom w-100">
                            ویرایش فیلم
                        </button>
                    </form>
                </div>
                <img src="<?= url('public/image/rotated-right-arrow-with-broken-line.png') ?>" class="teacher_movie-form-line2" alt="آیکن خط" />
                <img
                    src="<?= url('public/image/movie.png') ?>"
                    class="teacher_movie-form-movie1"
                    alt="آیکن فیلم" />
            </div>
        </div>
    </div>
</section>

<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/footer.php');
?>


</body>

</html>