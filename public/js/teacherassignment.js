 document.addEventListener('DOMContentLoaded', function () {
        var triggerTabList = [].slice.call(document.querySelectorAll('.nav-link'))
        triggerTabList.forEach(function (triggerEl) {
            triggerEl.addEventListener('click', function (event) {
                event.preventDefault(); // جلوگیری از رفتار پیش‌فرض لینک

                // حذف کلاس active از همه تب‌ها
                document.querySelectorAll('.nav-link').forEach(function (link) {
                    link.classList.remove('active');
                });
                document.querySelectorAll('.tab-pane').forEach(function (pane) {
                    pane.classList.remove('show', 'active');
                });

                // اضافه کردن کلاس active به تب کلیک‌شده
                triggerEl.classList.add('active');

                // فعال کردن محتوای تب مربوطه
                var tabId = triggerEl.getAttribute('href');
                document.querySelector(tabId).classList.add('show', 'active');
            });
        });

        // فعال کردن تب اول به‌صورت پیش‌فرض
        if (triggerTabList.length > 0) {
            triggerTabList[0].click();
        }
    });