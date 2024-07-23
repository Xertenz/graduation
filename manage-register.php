<?php
$pageTitle = "تسجيل حساب مدير جديد";
include './header.php';
include './nav.php';
session_start();
if(!isset($_SESSION['AdminId'])) {
  header('Location: manage-login.php');
  exit();
}
?>

<div class="register-wrapper">
      <form action="#" method="POST" class="register-form">
        <div class="form-group">
          <label for="username">
            <i class="fa fa-user"></i>
            <span>اسم المستخدم</span>
          </label>
          <br />
          <div class="form-control-wrapper">
            <input
              type="text"
              class="form-control username"
              name="username"
              id="username"
              autocomplete="off"
            />
            <span class="fill"></span>
          </div>
        </div>
        <div class="form-group">
          <label for="email">
            <i class="fa fa-envelope"></i>
            <span>البريد الالكتروني</span>
          </label>
          <br />
          <div class="form-control-wrapper">
            <input
              type="email"
              class="form-control email"
              name="email"
              id="email"
              autocomplete="off"
            />
            <span class="fill"></span>
          </div>
        </div>
        <div class="form-group">
          <label for="password">
            <i class="fa fa-key"></i>
            <span>كلمة المرور</span>
          </label>
          <br />
          <div class="form-control-wrapper">
            <input
              type="password"
              class="form-control password"
              name="password"
              id="password"
              autocomplete="off"
            />
            <span class="fill"></span>
          </div>
        </div>
        <div class="form-group btns-wrapper">
          <button class="btn register">
            <i class="fa fa-right-to-bracket"></i>
            <span>انشاء حساب</span>
          </button>
          <button type="reset" class="btn reset">
            <i class="fa fa-trash"></i>
            <span>تفريغ الحقول</span>
          </button>
        </div>
        <div class="" style="margin-top: 2rem;">
          <p><a href="manage.php">العودة الى صفحة الادارة</a></p>
        </div>
      </form>
    </div>

<?php // include './footer.php' ?>
    <script src="js/sweetalert.min.js"></script>
    <script >
        // Start Register Form
        let registerForm = document.querySelector(".register-form");
        let formBtns = document.querySelectorAll(".form-group.btns-wrapper .btn");

        registerForm.onsubmit = async function (event) {
          event.preventDefault();

          // Disabling Buttons While Sending Request
          formBtns.forEach((btn) => {
            btn.setAttribute("disabled", "");
          });

          // Sending Request
          let response = await fetch("manage-register-process.php", {
            method: "POST",
            body: new FormData(registerForm),
          });
          let data = await response.json();

          // Showing Response Message
          if (data.msg) {
            if(data.msg == 'success') {
              // window.location.href = 'manage.php'
              swal({
                icon: "success",
                title: "تم انشاء الحساب بنجاح",
                button: "حسناً",
              });
              registerForm.reset();
            }else if(data.msg == 'fail') {
              swal({
                icon: "error",
                title: "البريد الالكتروني مسجل مسبقا",
                button: "حسناً",
              });
            }
          } else {
            let elem = document.createElement("ul");
            elem.classList.add("errors");
            for (let error of data) {
              elem.innerHTML += `<li class="error-item"><p class="error-text">${error}</p></li>`;
            }
            swal({
              icon: "error",
              title: "يجب تعبئة جميع الحقول",
              content: elem,
              button: "حسناً",
            });
          }

          // Enabling Buttons After Request Completed
          formBtns.forEach((btn) => {
            btn.removeAttribute("disabled");
          });
        };
        // End Register Form
    </script>
    </body>
</html>