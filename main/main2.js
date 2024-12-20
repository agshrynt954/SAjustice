const form = document.querySelector("form");

form.addEventListener("submit", (e) => {
  e.preventDefault();
  const nama = document.getElementById("nama").value;
  const password = document.getElementById("password").value;

  if (nama && password) {
    alert("Login Successful");
  } else {
    alert("Please fill in both fields");
  }
});
