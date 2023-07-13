function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  document.getElementById('login-btn').addEventListener('click', function() {
    showForm('login-form');
});

document.getElementById('forgot-password-btn').addEventListener('click', function() {
    showForm('forgot-password-form');
});

document.getElementById('register-btn').addEventListener('click', function() {
    showForm('register-form');
});

function showForm(formId) {
    document.getElementById('login-form').style.display = 'none';
    document.getElementById('forgot-password-form').style.display = 'none';
    document.getElementById('register-form').style.display = 'none';
    
    document.getElementById(formId).style.display = 'block';
}