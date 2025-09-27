<?php
require_once(BASE_PATH . '/template/app/student/layouts/header.php');
?>
<title><?php if ($educational_videos) {
    echo 'ویدیو های درس' .' '. $educational_videos[0]['subject'];
}else {
    echo 'هیچ ویدیویی یافت نشد';
} ?>
     </title>
<?php
require_once(BASE_PATH . '/template/app/student/layouts/link.php');
?>
<?php
require_once(BASE_PATH . '/template/app/student/layouts/menu.php');
?>
<section>
    <div class="student_film">
        <div class="container">
            <div class="row py-5 position-relative">
<?php
foreach($educational_videos as $educational_video){
?>
                <div class="col-lg-4 gy-2">
                    <div class="card">
                        <video controls class="card-img-top" preload="metadata">
                            <source src=<?= url('public/video/one/quran/'.$educational_video['video_path']) ?> type="video/mp4">
                        </video>
                        <div class="card-body">
                            <h5 class="card-title"><?= $educational_video['title'] ?></h5>
                            <p class="card-text">
                                <?= $educational_video['description'] ?>
                            </p>
                            <a href="<?= url('public/video/one/quran/'.$educational_video['video_path']) ?>" download class="btn btn-custom">دانلود ویدیو</a>
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

<?php
require_once(BASE_PATH . '/template/app/student/layouts/footer.php');
?>
<!-- Initialize Swiper -->
<script src="<?= url('public/js/studentvideo.js') ?>">

</script>
</body>

</html>