<!DOCTYPE html>
<html lang="en">

<head>
  <title>ورود دانش آموز</title>
  <?php require_once(BASE_PATH . '/template/auth/layouts/head-tag.php') ?>
</head>

<body>


  <!-- From Uiverse.io by mahbowal -->
  <div class="container">
    <div class="heading"> ورود</div>
    <form class="form" method="post" action="<?= url('check-loginST') ?>">
      <?php
      $message = flash('login_error');
      if (!empty($message)) {
      ?>
        <div class="mb-2 alert alert-danger"> <small class="form-text text-danger">
            <?= $message ?>
          </small> </div>
      <?php
      } ?>
      <input
        placeholder="کد ملی"
        name="national_id"
        type="number"
        class="input"
        required="" />
      <input
        placeholder="Password"
        id="password"
        name="password"
        type="password"
        class="input"
        required="" />
      <span class="forgot-password"><a href="#">رمز عبور خود را فراموش کردید ?</a></span>
      <input value="ورود" type="submit" class="login-button" />
    </form>

    <span class="agreement"><a href="<?= url('registerST') ?>">ثبت نام کنید</a></span>
  </div>


  <?php require_once(BASE_PATH . '/template/auth/layouts/scripts.php') ?>



</body>

</html>