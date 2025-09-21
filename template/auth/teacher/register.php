<!DOCTYPE html>
<html lang="en">

<head>
    <title>ثبت نام معلم</title>
    <?php require_once(BASE_PATH . '/template/auth/layouts/head-tag.php') ?>
</head>

<body>


    <!-- From Uiverse.io by mahbowal -->
    <div class="container">
        <div class="heading"> ثبت نام</div>
        <form class="form" method="post" action="<?= url('register/storeTch') ?>" enctype="multipart/form-data">
            <?php
            $message = flash('register_error');
            if (!empty($message)) {
            ?>

                <div class="mb-2 alert alert-danger"> 
                    <small class="form-text text-danger">
                        <?= $message ?>
                    </small> 
                </div>
            <?php
            } ?>
            <input
                placeholder="نام"
                name="name"
                type="text"
                class="input"
                required="" />
            <input
                placeholder="نام خانوادگی"
                name="last_name"
                type="text"
                class="input"
                required="" />
            <input
                placeholder="کد ملی"
                name="national_id"
                type="number"
                class="input"
                required="" />
            <input
                placeholder="شماره تماس"
                name="phone"
                type="tel"
                class="input"
                required="" />
                <label for="input_image" id="image" class="input">عکس خود را انتخاب کنید.</label>
            <input
                name="profile_image"
                id="input_image"
                type="file"
                class="input d-none"
                required="" />
            <input
                placeholder="Password"
                id="password"
                name="password"
                type="password"
                class="input"
                required="" />
            <input value="ثبت نام کنید" type="submit" class="login-button" />
        </form>

        <span class="agreement"><a href="<?= url('loginTch') ?>">ورود به اکانت</a></span>
    </div>


    <?php require_once(BASE_PATH . '/template/auth/layouts/scripts.php') ?>


<script>
  const fileInput = document.getElementById("input_image");
  const fileLabel = document.getElementById("image");

  fileInput.addEventListener("change", function () {
    if (this.files && this.files.length > 0) {
      fileLabel.textContent = this.files[0].name; 
    } else {
      fileLabel.textContent = "لطفاً برای انتخاب عکس خود کلیک کنید"; 
    }
  });
</script>

</body>

</html>