<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zal's Pet Clinic</title>
</head>
<h3>
  <h1>Zal's Pet Clinic</h1>
  <h3>Form Login</h3>
  <form action="login_230017.php" method="post">
    <table>
      <tr>
        <td>Username</td>
        <td>: <input type="text" name="username_230017" required /></td>
      </tr>
      <tr>
        <td>Password</td>
        <td>: <input type="password" name="password_230017" id="pass" reqiuired></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp; <input type="checkbox" onclick="show()">Show Password</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;
          <input type="submit" name="login" value="LOGIN">
          <input type="reset" name="reset" value="RESET">
        </td>
      </tr>
    </table>
  </form>
  <script>
    function show() {
      var x = document.getElementById("pass");
      if (x.type == "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>
  </body>

</html>