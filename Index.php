<?php
/**
 * Created by PhpStorm.
 * User: Justin
 * Date: 2-4-2019
 * Time: 12:53
 */
?>
<!DOCTYPE html>
<head>

</head>

<?php
$nameErr = $passwordErr = "";
$name = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    } else {
        $password = test_input($_POST["password"]);
        if (!preg_match("/[/^a-zA-Z0-9*$ ]/", $password)) {
            $passwordErr = "";
        }
    }

    if (empty($_POST["confirm"])) {
        $confirmErr = "Confirm password";
    } else {
        $confirm = test_input($_POST["confirm"]);
        if (!preg_match("/[/^a-zA-Z0-9*$ ]/", $confirm)) {
            $confirmErr = "Password does not compete";
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* Required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Name: <input type="text" name="name" value="<?php echo $name; ?>">
    <span class="error">* <?php echo $nameErr; ?></span>
    <br><br>
    Password: <input type="text" name="password" value="<?php echo $password;?>">
    <span class="error">* <?php echo $passwordErr; ?></span>
    <br><br>
    Confirm Password: <input type="text" name="confirm" value="<?php echo $password;?>">
    <span class="error">* <?php $confirmErr; ?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $password;
?>


</body>
</html>
