// Start Graduation Year
let graduationYear = document.getElementById("year");
for (let i = 1980; i <= 2022; i++) {
  let option;
  if (i == 2022) {
    option = `<option value="${i}" selected>${i} - ${i + 1}</option>`;
  } else {
    option = `<option value="${i}">${i} - ${i + 1}</option>`;
  }
  graduationYear.innerHTML += option;
}
// End Graduation Year

// Start Phone Number Filtering
let phoneInputElement = document.querySelector(".phone");
phoneInputElement.addEventListener("keydown", function (event) {
  if (
    !(
      (event.keyCode >= 48 && event.keyCode <= 57) ||
      event.keyCode == 8 ||
      event.keyCode == 9
    )
  ) {
    event.preventDefault();
  }
});
// End Phone Number Filtering

// Start Register Form
let registerForm = document.querySelector(".login-form");
let formBtns = document.querySelectorAll(".form-group.btns-wrapper .btn");

registerForm.onsubmit = async function (event) {
  event.preventDefault();

  // Disabling Buttons While Sending Request
  formBtns.forEach((btn) => {
    btn.setAttribute("disabled", "");
  });

  // Sending Request
  let response = await fetch("register.php", {
    method: "POST",
    body: new FormData(registerForm),
  });
  let data = await response.json();

  // Showing Response Message
  if (data.msg) {
    swal({
      icon: "success",
      title: "تم التسجيل بنجاح",
      button: "حسناً",
    });
    registerForm.reset();
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
    console.log(data);
  }

  // Enabling Buttons After Request Completed
  formBtns.forEach((btn) => {
    btn.removeAttribute("disabled");
  });
};
// End Register Form
