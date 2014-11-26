<?php
include ('includes/connect.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>aa</title>
    <meta http-equiv = "Content-Type" content = "text/html"; charset="utf-8">
    <link rel="stylesheet" type = "text/css" href = "css/style_view.css">
  </head>
  <body>

<script type="text/javascript">
function provGuest() {
obj_form = document.forms.register;
obj_pole_login = obj_form.login;
obj_pole_email = obj_form.email;
obj_pole_password = obj_form.password;
obj_pole_password_r = obj_form.password_r;
var login = obj_pole_login.value;
var email = obj_pole_email.value;
var pass  = obj_pole_password.value;
var pass_r  = obj_pole_password__r.value;

if (login =="" || email =="" || pass =="" ||  pass_r == ""){
  alert ("Всі поля повинні бути заповнені");
  return;
}

if (email.indexOf("@") == -1) {
alert("Введіть коректний E-mail".);
return;
}
if (email.indexOf(".") == -1) {
alert("введіть коректний E-mail типу name@mail.ru");
return;
}
if (pass != pass_r) {
  alert("Паролі не зівпадають!!");
 return;
}
         }
obj_form.submit();
}
</script>
</body>

 <form name="register" method = "post" onSubmit="provGuest(); return(false);">
<h3><?php echo $lang[31][1]?></h3>
<input type = "text" name = "login" placeholder = "<?php echo $lang[14][1] ?>" /> <br>
<input type = "password" name = "password" placeholder = "<?php echo $lang[36][1] ?>" /> <br>
<input type = "password" name = "r_password" placeholder = "<?php echo $lang[24][1] ?>"/><br>
<input type = "email" name = "email" placeholder = "<?php echo $lang[14][1] ?>"/><br><br>
<input type = "submit" name = "submit" value = "<?php echo $lang[11][1] ?>" />
</form>
