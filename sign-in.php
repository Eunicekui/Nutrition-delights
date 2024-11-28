<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="src/styles.css" />
  <title>Sign up</title>
</head>

<body>
  <header>
    <nav>
      <div class="logo">
        <img src="images/logo-png.png" alt="logo" />
      </div>
      <div class="nav-links">
        <a href="index.html">Home | </a>
        <a href="about_diabeties.html">About Diabeties | </a>
        <a href="food&nutrition.html">Food & Nutrition | </a>
        <a href="health&welnness.html">Health & Wellness | </a>
        <a href="contact.html">Contact Us | </a>
        <a href="log-in.php">Login</a>
      </div>
    </nav>
  </header>
  <main>
    <section class="sign-up">
      <div class="container">
        <div class="contents">
          <img src="images/logo-transparent-png.png" alt="logo" />
          <form action="Nutrition-admin-panel/admin/code.php" method="POST">
            <?php
            require 'Nutrition-admin-panel/config/function.php';

            ?>
            <?= alertMessage(); ?>

            <h2>Sign In</h2>

            <label for="firstname">Name:</label>
            <input type="text" name="name" required /><br /><br />

            <label for="lastname">Phone No.:</label>
            <input
              type="text"
              name="phone"
              required /><br /><br />

            <label for="email">Email:</label>
            <input
              type="email"
              name="email"
              required /><br /><br />

            <label for="password">Password:</label>
            <input
              type="password"
              id="password"
              name="password"
              required /><br /><br />

            <button type="submit" name="signIn" class="btn btn-primary ">Sign-In</button>
            <p>
              Already have an account? <a href="log-in.php">Login here</a>.
            </p>
          </form>
        </div>
      </div>
    </section>
  </main>
</body>

</html>