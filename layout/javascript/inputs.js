const enroll_money = document.querySelector("[name=enroll_money]"),
      study_money = document.querySelector("[name=study_money]"),
      offer = document.querySelector("[name=offer]"),
      last_money = document.querySelector("[name=last_money]"),
      total = document.querySelector("[name=total]"),
      submitBtn = document.querySelector("[type=submit]"),
      inputs = document.querySelectorAll("input");

function enrollTotalMoney() {
  let arrOfInputs = [
    enroll_money, 
    study_money, 
    offer, 
    last_money
  ];

  let result; 
  // loop on inputs of enrolling
  arrOfInputs.forEach((e) => {
    e.addEventListener("keyup", (e) => {
      result = Number(enroll_money.value) + Number(study_money.value) -  Number(offer.value) +  Number(last_money.value);
      total.value = result;
    });
    moneyCalc();
  });

}

enrollTotalMoney();

function checkInputsValues() {
  submitBtn.addEventListener("click", (e) => {
    let isEmpty;
    const alertLabel = `<div class='alert alert-danger'><i class='fa fa-xmark-circle mx-2'></i>الرجاء ملء جميع الحقول</div>`;
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


function moneyCalc() {
  let gArray = [
    document.querySelector("[name=g1]"), 
    document.querySelector("[name=g2]"), 
    document.querySelector("[name=g3]"), 
    document.querySelector("[name=g4]"), 
    document.querySelector("[name=g5]"), 
    document.querySelector("[name=g6]"), 
    document.querySelector("[name=g7]")
  ];
  
  let pulled = document.querySelector(".money-g [name=pulled]");
  let resultMoney = document.querySelector(".money-g [name=result]");

  gArray.forEach((e) => {
    e.addEventListener("keyup", () => {
      let result = Number(gArray[0].value) + Number(gArray[1].value) + Number(gArray[2].value) + Number(gArray[3].value) + Number(gArray[4].value) + Number(gArray[5].value) + Number(gArray[6].value);
        pulled.value = result;
        resultMoney.value = total.value - pulled.value;
    });
  });

}

moneyCalc();