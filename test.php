<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $lang[31][1]?></title>
    <meta http-equiv = "Content-Type" content = "text/html"; charset = "utf-8">
    <link rel = "stylesheet" type = "text/css" href = "css/style.css">
  </head>
  <body>
      <form name="register" onSubmit="valid(); return(false);" method="post">
      <input type = "text" name = "login" placeholder = "login" /> <br>
      <input type = "text" name = "email" placeholder = "Email"/><br>
      <input type = "password" name = "pass" placeholder = "Пароль" /> <br>
      <input type = "password" name = "rpass" placeholder = "Повторіть пароль"/><br>
      <input type="submit" value="Отправить" name="submit">
      </form>

</body>
</html>



<script type="text/javascript">
  function valid() {
    obj_form = document.forms.register;
    obj_pole_name = obj_form.login;
    obj_pole_email = obj_form.email;
    obj_pole_pass = obj_form.pass;
    obj_pole_rpass = obj_form.rpass;

    var login  = obj_pole_name.value;
    var email  = obj_pole_email.value;
    var pass   = obj_pole_pass.value;
    var r_pass = obj_pole_rpass.value;

    if (login =="" || email == "" || pass =="" || r_pass == ""){
    alert ("Заповніть всі поля");
    return;
    }
    if (email.indexOf("@") == -1) {
    alert("Введіть коректний E-mail типу name@mail.ru");
    return;
    }
    if (email.indexOf(".") == -1) {
    alert("Введіть коректний E-mail типу name@mail.ru");
    return;
    }
    if (pass != r_pass) {
      alert("Паролі не зівпадають!!");
     return;
    }
    obj_form.submit();
  }
</script>
