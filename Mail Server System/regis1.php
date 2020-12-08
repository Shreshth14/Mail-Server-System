<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
if(isset($_POST['save']))
{
	$n=$_POST['n'];
	$e=$_POST['e'];
	$p=$_POST['p'];
	$m=$_POST['m'];
	$a=$_POST['a'];
	$ff=$_POST['ff'];
	if(file_exists('User_Data/$e'))
	{
	$msg="<font color='green' face='cursive'>User Already Exists</font>";
	}
	else
	{
	mkdir("User_Data/$e");
	mkdir("User_Data/$e/inbox");
	mkdir("User_Data/$e/sent");
	mkdir("User_Data/$e/draft");
	mkdir("User_Data/$e/spam");
	mkdir("User_Data/$e/trash");
	//mkdir("User_Data/$e/password");
	move_uploaded_file($_FILES['img']['tmp_name'],"User_Data/$e/".$_FILES['img']['name']);
	//echo $_FILES['img']['name'];
	$fo=fopen("User_Data/$e/$p","w");
	$fo1=fopen("User_Data/$e/profile","w");
	$fm=fopen("User_Data/$e/$m","w");
	$mm=fopen("User_Data/$e/$ff","w");
	fwrite($fo1,"Name:$n  Email:$e Password:$p Mobile:$m");
	$msg="<font color='green' face='cursive'>You Are Registered</font>";
	}
}
?>
<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $passErr = $mobnoErr = "";
$name = $email = $gender = $pass = $mobno = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

    if (empty($_POST["psw"])) {
    $passErr = "Password is required";
  } else {
    $pass = test_input($_POST["psw"]);
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["mobno"])) {
    $mobnoErr = "Mobile Number is required";
  } else {
    $mobno = test_input($_POST["mobno"]);
    // check if fees contains only numbers
    if (!preg_match("/^[0-9]*$/",$mobno)) {
      $mobnoErr = "Only digits allowed";
    }
  }
}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
	<table border="0" align="center" cellpadding="3">
	<caption><h2>Register</h2></caption>
		<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <p><span class="error">* required field</span></p>
			<tr>
				<td colspan="2"><?php echo @$msg;?></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="n" value="" placeholder="Enter your name"<?php echo $name;?>
        <span class="error">*<?php echo $nameErr;?> </span>
        <br><br></td>
			</tr>
			<tr>
				<td>Email Id</td>
				<td><input type="text" name="e" value="" placeholder="abc@gmail.com"<?php echo $email;?>
        <span class="error">* <?php echo $emailErr;?></span>
        </td>
			</tr>
      <tr>
        <td> Gender </td>
        <td> <input type="radio" name="a" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"> Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male"> Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other"> Other
        <span class="error">* <?php echo $genderErr;?></span> </td>

        <tr>
            <td>Mobile Number</td>
            <td>  <input type="text" name="m" value="" placeholder="Enter mobile number"<?php echo $mobno;?>
              <span class="error">* <?php echo $mobnoErr;?></span>
              </td>
        </tr>

      <tr>
				<td>Password</td>
                <td><head>
                <style>
                .error {color: #FF0000;}
                </style>
                </head>
                <body>
                  <style>
                  #message {
                    display:none;
                    background: #f1f1f1;
                    color: #000;
                    position: relative;
                    padding: 20px;
                    margin-top: 10px;
                  }
                  #message p {
                    padding: 10px 35px;
                    font-size: 18px;
                  }
                  /* Add a green text color and a checkmark when the requirements are right */
                  .valid {
                    color: green;
                  }
                  .valid:before {
                    position: relative;
                    left: -35px;
                    content: "✔";
                  }
                  /* Add a red text color and an "x" when the requirements are wrong */
                  .invalid {
                    color: red;
                  }
                  .invalid:before {
                    position: relative;
                    left: -35px;
                    content: "✖";
                  }
                  </style>
                  </head>
                  <body>
                  <div class="container">
                    <form action="/action_page.php">
                      <label for="psw"> </label>
                      <input type="password" id="psw" name="p" placeholder="Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required <?php echo $pass;?>
                      <span class="error">* <?php echo $passErr;?></span>
                    </form>
                  </div>
                  <div id="message">
                    <h3>Password must contain the following:</h3>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                  </div>

                  <script>
                  var myInput = document.getElementById("psw");
                  var letter = document.getElementById("letter");
                  var capital = document.getElementById("capital");
                  var number = document.getElementById("number");
                  var length = document.getElementById("length");

                  // When the user clicks on the password field, show the message box
                  myInput.onfocus = function() {
                    document.getElementById("message").style.display = "block";
                  }

                  // When the user clicks outside of the password field, hide the message box
                  myInput.onblur = function() {
                    document.getElementById("message").style.display = "none";
                  }

                  // When the user starts to type something inside the password field
                  myInput.onkeyup = function() {
                    // Validate lowercase letters
                    var lowerCaseLetters = /[a-z]/g;
                    if(myInput.value.match(lowerCaseLetters)) {
                      letter.classList.remove("invalid");
                      letter.classList.add("valid");
                    } else {
                      letter.classList.remove("valid");
                      letter.classList.add("invalid");
                    }

                    // Validate capital letters
                    var upperCaseLetters = /[A-Z]/g;
                    if(myInput.value.match(upperCaseLetters)) {
                      capital.classList.remove("invalid");
                      capital.classList.add("valid");
                    } else {
                      capital.classList.remove("valid");
                      capital.classList.add("invalid");
                    }

                    // Validate numbers
                    var numbers = /[0-9]/g;
                    if(myInput.value.match(numbers)) {
                      number.classList.remove("invalid");
                      number.classList.add("valid");
                    } else {
                      number.classList.remove("valid");
                      number.classList.add("invalid");
                    }

                    // Validate length
                    if(myInput.value.length >= 8) {
                      length.classList.remove("invalid");
                      length.classList.add("valid");
                    } else {
                      length.classList.remove("valid");
                      length.classList.add("invalid");
                    }
                  }
                  </script>
              </body></td>
            </tr>


			<tr>
                <td>Upload Your Image</td>
                <td><input type="file" value="" name="img"/></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Save" name="save">
                                               <input type="reset" value="Reset"></td>
            </tr>
        </form>
    </table>
</body>
</html>
