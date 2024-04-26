<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="loginPage.css">
        
    </head>

    <body>
        <div class="container">
            <h1>Login</h1>

            <form action="loginBackend.php" method="post">
                <input type="text" name="username" placeholder="Username:"> <br>
                <div class="button_container">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </body>
</html>