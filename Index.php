Ø<?php
/**
 * Created by PhpStorm.
 * User: Justin
 * Date: 2-4-2019
 * Time: 12:53
 */
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
$nameErr = $passwordErr = "";
$name = $password = "";

if ($_SERVER["request_method"] == "post") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    }
    else {
        $password = test_input($_POST["password"]);
        if (!preg_match("/[/^a-zA-Z0-9*$ ]/", $password)) {
            $passwordErr = "";
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Confirm password";
    }
    else {
        $password = test_input($_POST["password"]);
        if (!preg_match("/[/^a-zA-Z0-9*$ ]/", $password)) {
            $passwordErr = "Password does not compete";
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* Required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"




</body>
</html>
