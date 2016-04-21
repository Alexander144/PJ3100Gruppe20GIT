<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
include_once 'header.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Registration Form</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <div id="registrationPage">
        <h1>Register with us</h1>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?><!--
        <ul>
            <li>Usernames may contain only digits, upper and lowercase letters and underscores</li>
            <li>Emails must have a valid email format</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one uppercase letter (A..Z)</li>
                    <li>At least one lowercase letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>
        </ul><br>-->
        <form action = "<?php echo esc_url($_SERVER['PHP_SELF']); ?>"
                method = "post"
                name = "registration_form">

            <div id="registration">
                <h3 id="registerh3">Registrer deg her</h3>
                    <input
                            placeholder="Username"
                            class = "registerField" 
                            type = "text"
                            name = "username"
                            id = "username" />
                            <br><br>

                    <input
                            placeholder="Email"
                            class = "registerField"
                            type = "text"
                            name = "email"
                            id = "email" />
                            <br><br>

                    <input
                            placeholder="Password"
                            class = "registerField"
                            type = "password"
                            name = "password"
                            id = "password"/>
                            <br><br>

                    <input
                            placeholder="Confirm password"
                            class = "registerField"
                            type = "password"
                            name = "confirmpwd"
                            id = "confirmpwd" />
                            <br><br>

                            <input
                                id = "registrationBTN"
                                class="buttonDesign"
                                type = "button"
                                value = "Register"
                                onclick = "return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);" />
            </div>
        </form>
        <p>Return to the <a href="login.php">login page</a>.</p>
        </div>
    </body>
</html>

    <?php include_once 'footer.php'; ?>
