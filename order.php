<?php
$pageTitle = "تقديم طلب";
include './header.php';
include './nav.php';
?>
<div class="order-wrapper">
      <form action="#" method="POST" class="login-form">
        <div class="form-group">
          <label for="fullname">
            <i class="fa fa-signature"></i>
            <span>الاسم الرباعي</span>
          </label>
          <br />
          <div class="form-control-wrapper">
            <input
              type="text"
              class="form-control fullname"
              name="fullname"
              id="fullname"
              autocomplete="off"
            />
            <span class="fill"></span>
          </div>
        </div>
        <div class="form-group">
          <label for="fullname_eng">
            <i class="fa fa-signature"></i>
            <span>الاسم باللغة الانكليزية</span>
          </label>
          <br />
          <div class="form-control-wrapper">
            <input
              type="text"
              class="form-control fullname_eng"
              name="fullname_eng"
              id="fullname_eng"
              autocomplete="off"
            />
            <span class="fill"></span>
          </div>
        </div>
        <div class="form-group">
          <label for="year">
            <i class="fa fa-calendar-days"></i>
            <span>سنة التخرج</span>
          </label>
          <br />
          <div class="form-control-wrapper">
            <select name="year" id="year" class="form-control year"></select>
          </div>
        </div>
        <div class="form-group">
          <label for="department">
            <i class="fa fa-flask"></i>
            <span>القسم العلمي</span>
          </label>
          <br />
          <div class="form-control-wrapper">
            <input
              type="text"
              class="form-control department"
              name="department"
              id="department"
              autocomplete="off"
            />
            <span class="fill"></span>
          </div>
        </div>
        <div class="form-group">
          <label for="address">
            <i class="fa fa-address-card"></i>
            <span>العنوان</span>
          </label>
          <br />
          <div class="form-control-wrapper">
            <input
              type="text"
              class="form-control address"
              name="address"
              id="address"
              autocomplete="off"
            />
            <span class="fill"></span>
          </div>
        </div>
        <div class="form-group">
          <label for="phone">
            <i class="fa fa-phone-flip"></i>
            <span>رقم الموبايل</span>
          </label>
          <br />
          <div class="form-control-wrapper">
            <input
              type="text"
              class="form-control phone"
              name="phone"
              id="phone"
              autocomplete="off"
            />
            <span class="fill"></span>
          </div>
        </div>
        <div class="form-group">
          <label for="doc_to">
            <i class="fa fa-file"></i>
            <span>وثيقة معنونة الى</span>
          </label>
          <br />
          <div class="form-control-wrapper">
            <input
              type="text"
              class="form-control doc_to"
              name="doc_to"
              id="doc_to"
              autocomplete="off"
            />
            <span class="fill"></span>
          </div>
        </div>
        <div class="form-group btns-wrapper">
          <button class="btn register">
            <i class="fa fa-right-to-bracket"></i>
            <span>تسجيل</span>
          </button>
          <button type="reset" class="btn reset">
            <i class="fa fa-trash"></i>
            <span>تفريغ الحقول</span>
          </button>
        </div>
      </form>
    </div>

<?php include './footer.php' ?>