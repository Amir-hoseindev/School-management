<?php
require_once(BASE_PATH . '/template/app/student/layouts/header.php');
?>
<title>ویرایش پروفایل</title>
<?php
require_once(BASE_PATH . '/template/app/student/layouts/link.php');
?>
<?php
require_once(BASE_PATH . '/template/app/student/layouts/menu.php');
?>
<div class="container mt-5">
    <div class="row">
        <h2 class="text-center mb-4 text-light">ویرایش پروفایل</h2>
        <p class="text-center mb-4 text-light">
            در این بخش می‌توانید اطلاعات شخصی، فرزندان، و تنظیمات خود را به‌روز
            کنید. لطفاً تغییرات را با دقت ذخیره کنید.
        </p>
        <div class="student_profile">
            <img
                src="<?= url('public/image/2533e2696189138baeb4a79e4886a9de.jpg') ?>"
                alt="عکس پروفایل"
                class="" />
        </div>
        <p class="text-center text-danger mb-4">
             نکات مهم: اطلاعات تغییر یافته پس از تأیید ذخیره می‌شود
        </p>
        <div class="pill_form-container">
            <h5 class="mb-3">ویرایش پروفایل</h5>
            <form>
                <div class="mb-3">
                    <label for="drugName" class="pill_form-label">نام</label>
                    <input
                        type="text"
                        class="form-control"
                        id="drugName"
                        placeholder="مثال: طاها"
                        required />
                </div>
                <div class="mb-3">
                    <label for="drugName" class="pill_form-label">نام خانوادگی</label>
                    <input
                        type="text"
                        class="form-control"
                        id="drugName"
                        placeholder="مثال: رحمانی"
                        required />
                </div>
                <div class="mb-3">
                    <label for="drugName" class="pill_form-label">کد ملی دانش آموز</label>
                    <input
                        type="number"
                        class="form-control"
                        id="drugName"
                        placeholder="مثال: 094156987"
                        required />
                </div>
                <div class="mb-3">
                    <label for="dosage" class="pill_form-label">انتخاب کلاس</label>
                    <select name="" id="" class="form-control">
                        <option value="">کلاس اول</option>
                        <option value="">کلاس دوم</option>
                        <option value="">کلاس سوم</option>
                        <option value="">کلاس چهارم</option>
                        <option value="">کلاس پنجم</option>
                        <option value="">کلاس ششم</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="schedule" class="pill_form-label">تصویر دانش آموز را واردکنید</label>
                    <input type="file" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label for="drugName" class="pill_form-label">شماره تماس</label>
                    <input
                        type="number"
                        class="form-control"
                        id="drugName"
                        placeholder="مثال: 09025648932"
                        required />
                </div>
                <div class="mb-3">
                    <label for="drugName" class="pill_form-label">رمز عبور</label>
                    <input
                        type="text"
                        class="form-control"
                        id="drugName"
                        placeholder="مثال: Omid6925"
                        required />
                </div>

                <button type="submit" class="btn pill_btn-custom w-100">
                    ارسال
                </button>
            </form>
        </div>
    </div>
</div>

<?php
require_once(BASE_PATH . '/template/app/student/layouts/footer.php');
?>
</body>

</html>