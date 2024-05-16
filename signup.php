<?php include_once('header.php'); ?>

<?php include_once('nav.php'); ?>

<div class="container">
    <h3 class="my-3">Register Page</h3>

    <?php 

        include_once("config/Database.php");
        include_once("class/UserRegister.php");
        include_once("class/Utils.php");

        $connectDB = new Database();
        $db = $connectDB->getConnection();

        $user = new UserRegister($db);
        $bs = new Bootstrap();

        if (isset($_POST['signup'])) {
            $user->setName($_POST['name']);
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            $user->setConfirmPassword($_POST['confirm_password']);

            if (!$user->validatePassword()) {
                $bs->displayAlert("Passwords do not match", "danger");
                // echo "<div class='alert alert-danger' role='alert'>Passwords do not match</div>";
            }

            if (!$user->checkPasswordLength()) {
                $bs->displayAlert("Password must be at least 6 characters long.", "danger");
                // echo "<div class='alert alert-danger' role='alert'>Password must be at least 6 characters long.</div>";
            }

            if ($user->checkEmail()) {
                $bs->displayAlert("This email is already exists try another.", "danger");
                // echo "<div class='alert alert-danger' role='alert'>This email is already exists try another.</div>";
            }

            if ($user->createUser()) {
                $bs->displayAlert("User Created Successfully.", "success");
                // echo "<div class='alert alert-success' role='alert'>
                //     User Created Successfully.
                // </div>";
            } else {
                $bs->displayAlert("Failed to create a user.", "danger");
                // echo "<div class='alert alert-danger' role='alert'>
                //     Failed to create a user.
                // </div>";
            }
        }
    
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" aria-describedby="name" placeholder="Enter your name">
        </div>
        <div class="mb-3">
            <label for="email address" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" aria-describedby="email" placeholder="Enter your email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" aria-describedby="password" placeholder="Enter your password">
        </div>
        <div class="mb-3">
            <label for="confirm password" class="form-label">Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control" aria-describedby="confirm password" placeholder="Confirm your password">
        </div>
        <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
    </form>

    <p class="mt-3">Already have an account? go to <a href="signin.php">Sign In</a> Page</p>
    

    <hr>
    <a href="index.php" class="btn btn-secondary">Go back</a>
</div>

<?php include_once('footer.php'); ?>