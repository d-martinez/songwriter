<?php
$username = "";
    if (isset($_POST['submit'])) {
        $required_fields = array("username", "password");
        validate_presences($required_fields);
    
        if (empty($errors)) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $found_admin = attempt_login($username, $password);

            if ($found_admin) {
                redirect_to("home.php");
            } else {
                $_SESSION["message"] = "Username/password not found.";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Of Kings + Wolves: Songwriter</title>
	</head>
	<body>
        <style>
            body {
                background-color: #212429;
            }
            #left_page {
                float: right;
                width: 60%;
            }
            #title {
                margin: auto;
                text-align: center;
                position: relative;
                margin-top: 40%;
                color: #CACACC;
                font-family: Century Gothic;
                font-size: 32px;
                font-weight: 900;
            }
            #right_page {
                float: right;
                width: 40%;
            }
            form {
                margin: auto;
                width: 250px;
                align-items: center;
                background-color: #121310;
                text-align: center;
                padding-top: 10px;
                padding-bottom: 10px;
                position: auto;
                border: 20px;
                border-color: black;
                border-radius: 4px;
            }
            #login {
                position: relative!important;
                margin-top: 50%;
                margin-right: 70%;
            }
            #form_header {
                font-size: 20px;
                text-align: left;
                color: #CACACC!important;
                padding-left: 25px;
                font-family: Verdana;
            }
            input[type=text], input[type=password] {
                height: 26px;
                font-size: 16px;
                color: gainsboro;
                background-color: #18191E;
                padding: 2px 1px;
                margin: 1px 1px;
                text-align: center;
                border: none!important;
                font-family: Verdana;
            }
            input[type=submit] {
                background-color: #800000;
                cursor: pointer;
                font-size: 16px;
                color: #CACACC;
                margin: 4px 2px;
                padding: 10px 20px;
                height 30px!important;
                border-radius: 4px;
                border: none;
                font-family: Verdana;
            }
        </style>
        <div id="right_page">
            <form id="login" action="login_processing.php" method="post"> 
                <div align="center" id="form_header">Log in</div>
                <br />
                    <input type="text" name="username" value="<?php echo htmlentities($username); ?>" placeholder="username" /><br />
                <br />    
                    <input type="password" name="password" value="" placeholder="password" /><br />
                <br />
                    <input type="submit" name="submit" value="Submit" />
            </form>
        </div>
        <div id="left_page">
            <div id="logo">
                <p id="title">Of Kings + Wolves: Songwriter</p>
            </div>
        </div>
	</body>
</html>
