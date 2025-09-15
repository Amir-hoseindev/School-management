<?php
require_once(BASE_PATH . '/template/app/student/layouts/header.php');
?>
    <title>نمرات</title>
<?php
require_once(BASE_PATH . '/template/app/student/layouts/link.php');
?>
<?php
require_once(BASE_PATH . '/template/app/student/layouts/menu.php');
?>
    

    <section>
      <div class="grade">
        <div class="container mt-5">
          <h2 class="text-center mb-4 grade_title">بررسی نمرات فرزندتان</h2>
          <div class="grade-card">
            <!-- جدول نمرات -->
            <div class="table-responsive">
              <table class="table table-custom table-striped" id="gradeTable">
                <thead>
                  <tr>
                    <th class="text-center">درس</th>
                    <th class="text-center">نمره</th>
                    <th class="text-center">تاریخ</th>
                    <th class="text-center">اقدامات</th>
                    <th class="text-center">وضعیت</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center">فارسی</td>
                    <td class="text-center">18</td>
                    <td class="text-center">02/09/2025</td>

                    <td class="text-center">
                      <a href="#" class="btn btn-custom btn-sm"
                        >درخواست بازنگری</a
                      >
                    </td>
                    <td class="text-center">چیزی ثبت نشده</td>
                  </tr>
          
                  <tr>
                    <td class="text-center">فارسی</td>
                    <td class="text-center">18</td>
                    <td class="text-center">02/09/2025</td>

                    <td class="text-center">
                      <a href="#" class="btn btn-custom btn-sm"
                        >درخواست بازنگری</a
                      >
                    </td>
                    <td class="text-center">چیزی ثبت نشده</td>
                  </tr>
          
                  <tr>
                    <td class="text-center">فارسی</td>
                    <td class="text-center">18</td>
                    <td class="text-center">02/09/2025</td>

                    <td class="text-center">
                      <a href="#" class="btn btn-custom btn-sm"
                        >درخواست بازنگری</a
                      >
                    </td>
                    <td class="text-center">چیزی ثبت نشده</td>
                  </tr>
          
                  <tr>
                    <td class="text-center">فارسی</td>
                    <td class="text-center">18</td>
                    <td class="text-center">02/09/2025</td>

                    <td class="text-center">
                      <a href="#" class="btn btn-custom btn-sm"
                        >درخواست بازنگری</a
                      >
                    </td>
                    <td class="text-center">چیزی ثبت نشده</td>
                  </tr>
          
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
  </body>
</html>
