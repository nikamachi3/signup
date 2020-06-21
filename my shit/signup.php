<?php 
require "header.php";
?>
<main>
    <h1>SIGNUP</h1>
    <form action="includes/signup.inc.php" method="post"> 
        <input type="text" name="emailid" placeholder="Email">
        <input type="text" name="userid" placeholder="Username">
        <input type="password" name="psw" placeholder="Password">
        <input type="password" name="psw-repeat" placeholder="Repeat Password">
        <button type="submit" name="signup-submit">Signup</button>

    </form>
</main>

<?php 
require "footer.php";
?>