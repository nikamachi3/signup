<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <div>
                <form action="includes/login.inc.php" method="post">
                    <input type="text" name="usernameid" placeholder="username">
                    <input type="password" name="psw" placeholder="password">
                    <button name="login-submit" type="submit">SUBMIT</button>
                </form>
                <a href="signup.php">Don't have a Login? Signup here</a>
                <form action="includes/logout.inc.php">
                    <button type="submit" name="logout-submit">Logout</button>
                </form>
            </div>
        </nav>
    </header>