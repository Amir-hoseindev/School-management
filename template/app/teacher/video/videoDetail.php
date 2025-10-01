<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/header.php');
?>
<title>فیلم های آموزشی درس <?= $videos[0]['video_subject'] ?></title>
<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/link.php');
?>
<?php
require_once(BASE_PATH . '/template/app/teacher/layouts/menu.php');
?>

<section>
    <div class="teacher_internalPageMovie">
        <div class="container mt-5">
            <h2 class="text-center fw-bold mb-4 teacher_internalPageMovie-title">
                مدیریت فیلم‌های آموزشی
            </h2>

            <!-- لیست ویدیوها -->
            <div class="row">
                <?php
                if ($videos) {
                
                foreach ($videos as $video) {
                ?>
                    <div class="col-lg-4 col-md-6 gy-4">
                        <div class="teacher_internalPageMovie-video-card">
                            <video controls class="card-img-top" preload="metadata">
                                <source
                                    src="<?= url($video['video_file_path']) ?>"
                                    type="video/mp4" />
                            </video>
                            <h5 class="teacher_internalPageMovie-video-title mt-2">
                                <?= $video['video_title'] ?>
                            </h5>
                            <p> <?php
                             $date = new DateTime($video['video_date']);
                              $date = $date->format('Y/m/d');
                              echo 'تاریخ : '. $date .'  |  '; 
                              echo 'درس : '. $video['video_subject'] .'  |  '; 
                              echo 'پایه : '. $video['video_grade'] ; 
                              ?></p>
                            <p><?= $video['video_description'] ?></p>
                            <div class="mt-2">
                                <a href="<?= url('teacher/editVideo/'.$video['video_id']) ?>" class="btn btn-custom btn-sm me-2">ویرایش</a>
                                <a
                                    href="<?= url($video['video_file_path']) ?>"
                                    download
                                    class="btn btn-custom btn-sm me-2">دانلود</a>
                                <a href="<?= url('teacher/deleteVideo/'.$video['video_id']) ?>" class="btn btn-custom btn-sm">حذف</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                }else{
                    ?>
                    <p class="text_center fs-3 fw-bold text-danger">هیچ ویدیویی یافت نشد</p> 
                
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
            <h2 class="text-center mb-4 teacher_movie-form-title">
                آپلود فیلم آموزشی 
            </h2>
            <h3 class="text-center mb-4 teacher_movie-form-title">
                 درس <?= $subject_teacher['subject'] ?>
            </h3>
            <h4 class="text-center mb-4 teacher_movie-form-title">
                 پایه ی <?= $subject_teacher['grade'] ?>
            </h4>

            <!-- فرم آپلود ویدیو -->
            <div class="row position-relative">
                <img src="<?= url('public/image/car.png') ?>" class="teacher_movie-form-car" alt="آیکن ماشین" />
                <img src="<?= url('public/image/curved-arrow-with-broken-line.png') ?>" class="teacher_movie-form-line1" alt="آیکن خط" />

                <div class="pill_form-container">
                    <h5 class="mb-3">آپلود ویدیو</h5>
                    <form action="<?= url('teacher/storVideo') ?>" method="post" enctype="multipart/form-data">
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
                                placeholder="مثال: ریاضی"
                                required />
                            <input
                                class="d-none"
                                name="academic_year_id"
                               value="<?= $subjects[0]['academic_year_id'] ?>" />
                            <input
                                class="d-none"
                                name="grade"
                               value="<?= $subjects[0]['grade'] ?>" />
                          
                        </div>
                        <div class="mb-3">
                            <label for="dosage" class="pill_form-label">انتخاب درس</label>
                            <select name="subject" id="" class="form-control">
                                <?php
                                
                                foreach ($subjects as $ts) {
                                    
                                ?>
                                    <option value="<?= $ts['subject'] ?>"><?= $ts['subject'] ?></option>
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
                                name="description"></textarea>
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