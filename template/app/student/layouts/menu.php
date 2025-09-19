  </head>
  <body>
    <section>
      <nav
        class="navbar navbar-expand-lg bg-body-tertiary rounded"
        aria-label="Eleventh navbar example"
      >
        <div class="container-fluid">
          <a class="btn btn-custom mx-2 d-flex align-items-center" href="<?= url('student/profile') ?>">
            <span class="fw-bold"> ویرایش پروفایل </span>
            <i class="bi bi-person-circle mx-2"></i>
          </a>
        
          <p class="fs-5 fw-bold text-dark mx-xl-5 mx-2 my-0"><?= $student['name'] . ' ' . $student['last_name'] ?></p>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarsExample09"
            aria-controls="navbarsExample09"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarsExample09">
            <ul class="navbar-nav ms-auto mb-1 mb-lg-0">
              <li class="nav-item mx-xxl-3 mx-1">
                <a
                  class="nav-link active fs-5 fw-bold"
                  aria-current="page"
                  href="<?= url('student') ?>"
                  >صفحه اصلی</a
                >
              </li>
              <li class="nav-item mx-xxl-3 mx-1">
                <a class="nav-link fs-5 fw-bold" href="<?= url('student/camp') ?>">اردوها</a>
              </li>
              <li class="nav-item mx-xxl-3 mx-1">
                <a class="nav-link fs-5 fw-bold" href="<?= url('student/video') ?>">فیلم های آموزشی</a>
              </li>
              <li class="nav-item mx-xxl-3 mx-1">
                <a class="nav-link fs-5 fw-bold" href="<?= url('student/grades') ?>">نمرات</a>
              </li>
              <li class="nav-item mx-xxl-3 mx-1">
                <a class="nav-link fs-5 fw-bold" href="<?= url('student/assignments') ?>">تکالیف</a>
              </li>
              <li class="nav-item mx-xxl-3 mx-1">
                <a class="nav-link fs-5 fw-bold" href="<?= url('student/leisureTime') ?>">اوقات فراقت</a>
              </li>
              <li class="nav-item mx-xxl-3 mx-1">
                <a class="nav-link fs-5 fw-bold" href="<?= url('llll') ?>">خروج</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </section>