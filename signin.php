<?php include_once('header.php'); ?>

<?php include_once('nav.php'); ?>

<div class="container">
    <h3 class="my-3">Login Page</h3>

    <?php 

        include_once("config/Database.php");
        include_once("class/UserLogin.php");
        include_once("class/Utils.php");

        $connectDB = new Database();
        $db = $connectDB->getConnection();

        $user = new UserLogin($db);
        $bs = new Bootstrap();

        if (isset($_POST['signin'])) {
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);

            if ($user->emailNotExists()) {
                $bs->displayAlert("Email is not exists", "danger");
                // echo "<div class='alert alert-danger' role='alert'>Email is not exists</div>";
            } else {
                if ($user->verifyPassword()) {
                    // $bs->displayAlert("Email is not exists", "danger");
                    // echo "<div class='alert alert-success' role='alert'>Password matches</div>";
                } else {
                    $bs->displayAlert("Password do not match", "danger");
                    // echo "<div class='alert alert-danger' role='alert'>Password do not match</div>";
                }
                // echo "<div class='alert alert-success' role='alert'>Email is exists</div>";
            }
        }

    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <div class="mb-3">
            <label for="email address" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" aria-describedby="email" placeholder="Enter your email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" aria-describedby="password" placeholder="Enter your password">
        </div>
        <button type="submit" name="signin" class="btn btn-primary">Sign In</button>
    </form>

    <p class="mt-3">Do not have an account yet? go to <a href="signup.php">Sign Up</a> Page</p>
    

    <hr>
    <a href="index.php" class="btn btn-secondary">Go back</a>
</div>

<?php include_once('footer.php'); ?>