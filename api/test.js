let log = false;
let usersList = document.querySelector("ul");

if (log == false) {
  login();
}

document.querySelector("[type=submit]").addEventListener("click", (e) => {
  e.preventDefault();
  addUser("http://techschool.com/admin/users/addUser.php");
  window.location.reload();
});



function login() {
  const User = {
    name: "M.Anwer",
    pass: "mohamed132006"
  };
  
  $.ajax({
    type: "POST",
    url: "http://techschool.com/views/login",
    data: `username=${User.name}&password=${User.pass}`,
    success: function () {
      log = true;
    }
  });
}


function addUser(url) {
  const newUser = {
    username: document.querySelector("[name=username]").value,
    password: document.querySelector("[name=password]").value,
    email: document.querySelector("[name=email]").value,
    admin: document.querySelector("[name=admin]").value
  }
  let alerts = `
    <div class='alert alert-success'>
        <h4> تم الإضافة بنجاح</h4>
    </div>
  `;
  $.ajax({
    type: "POST",
    url: url,
    data: `username=${newUser.username}&password=${newUser.password}&email=${newUser.email}&admin=${newUser.admin}`,
    success : function() {
      document.body.insertAdjacentHTML("beforeend", alerts)
      setTimeout(() => {
        document.querySelector(".alert").remove();
      }, 3000);
    }
  });
} 

async function getDate(url) {
  let fetchData = await fetch(url);
  let users = await fetchData.json();
  users.forEach(e => {
    let li = document.createElement("li");
    li.append(`${e.id} - ${e.UserName}`);
    usersList.appendChild(li);
  });
}


getDate("http://techschool.com/api/inputs");