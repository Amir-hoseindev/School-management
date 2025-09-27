<?php
require_once(BASE_PATH . '/template/app/student/layouts/header.php');
?>
<title>ویدیو های آموزشی</title>
<?php
require_once(BASE_PATH . '/template/app/student/layouts/link.php');
?>
<?php
require_once(BASE_PATH . '/template/app/student/layouts/menu.php');
?>
<section>
    <div class="student_film">
        <div class="container-fluid">
            <div class="row py-5 position-relative">
                <div class="col-lg-5">
                    <div class="student_film-image">
                        <div class="student_film-image-img1">
                            <video
                                autoplay muted loop
                                class="student_film-image-img1-1"
                                preload="metadata">
                                <source
                                    src="<?= url('public/video/2893d4fe7b335d912958a0c29d91fdd5.mp4') ?>"
                                    type="video/mp4" />
                            </video>
                        </div>
                        <div class="student_film-image-img2">
                            <img
                                src="<?= url('public/image/2533e2696189138baeb4a79e4886a9de.jpg') ?>"
                                alt="عکس کلاس"
                                class="student_film-image-img2-2" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row g-2">



                        <?php
                        foreach ($grades as $grade) {
                        ?>


                            <div class="col-6 col-lg-4">
                                <a href="<?= url('student/videoDetail/' . $grade['id']) ?>" class="fild_box btn px-1">
                                    <div class="fild_box-content">
                                        <img src="<?= url('public/image/' . $grade['image_path']) ?>" class="img-fuind" alt="عکس <?= $grade['subject'] ?>" />
                                        <p><?= $grade['subject'] ?></p>
                                    </div>
                                </a>
                            </div>
                        <?php
                        }
                        ?>





                    </div>
                    <img src="<?= url('public/image/movie.png') ?>" class="student_film-movie" alt="عکس فیلم" />
                </div>

                <img src="<?= url('public/image/fly.png') ?>" class="student_film-fly" alt="عکس قلب و ستاره" />
            </div>
        </div>
    </div>
</section>

<?php
require_once(BASE_PATH . '/template/app/student/layouts/footer.php');
?>
<!-- Initialize Swiper -->
<script src="<?= url('public/js/studentvideo.js') ?>">

</script>
</body>

</html>