const submitBtn = document.querySelector(".btn-success"),
        total = document.querySelector("[name=total]"),
        inputs = document.querySelectorAll(".container input");


function checkInputsValues() {
  submitBtn.addEventListener("click", (e) => {
    let isEmpty;
    const alertLabel = "<div class='alert alert-danger'><i class='fa fa-xmark-circle mx-2'></i>الرجاء ملء جميع الحقول</div>";
    inputs.forEach((input) => {
      if(input.value == "") {
        e.preventDefault();
        isEmpty = true;
      }
    });
    isEmpty == true ? document.querySelector(".main-page").insertAdjacentHTML("afterbegin", alertLabel) : "";
    setTimeout(() => {
      document.querySelector(".alert").remove();
    }, 3000);
  });
}

checkInputsValues();

function totalCalc() { 
  inputs.forEach((e) => {
    e.addEventListener("keyup", (e) => {
      total.value = 
        Number(inputs[0].value) +
        Number(inputs[1].value) + 
        Number(inputs[2].value) +
        Number(inputs[3].value) +
        Number(inputs[4].value) +
        Number(inputs[5].value) +
        Number(inputs[6].value) +
        Number(inputs[7].value) +
        Number(inputs[8].value) +
        Number(inputs[9].value) +
        Number(inputs[10].value);
    });
  });
}

totalCalc();