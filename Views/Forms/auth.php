<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login &amp; signup form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    @import url("https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap");

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    html,
    body {
      display: grid;
      height: 100%;
      width: 100%;
      place-items: center;
      background: #282a36;
    }

    ::selection {
      background: #1a75ff;
      color: #fff;
    }

    .wrapper {
      overflow: hidden;
      max-width: 390px;
      background: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1);
    }

    .wrapper .title-text {
      display: flex;
      width: 200%;
    }

    .wrapper .title {
      width: 50%;
      font-size: 35px;
      font-weight: 600;
      text-align: center;
      transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .wrapper .slide-controls {
      position: relative;
      display: flex;
      height: 50px;
      width: 100%;
      overflow: hidden;
      margin: 30px 0 10px 0;
      justify-content: space-between;
      border: 1px solid lightgrey;
      border-radius: 15px;
    }

    .slide-controls .slide {
      height: 100%;
      width: 100%;
      color: #fff;
      font-size: 18px;
      font-weight: 500;
      text-align: center;
      line-height: 48px;
      cursor: pointer;
      z-index: 1;
      transition: all 0.6s ease;
    }

    .slide-controls label.signup {
      color: #000;
    }

    .slide-controls .slider-tab {
      position: absolute;
      height: 100%;
      width: 50%;
      left: 0;
      z-index: 0;
      border-radius: 15px;
      background: -webkit-linear-gradient(left, #003366, #004080, #0059b3, #0073e6);
      transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    input[type="radio"] {
      display: none;
    }

    #signup:checked~.slider-tab {
      left: 50%;
    }

    #signup:checked~label.signup {
      color: #fff;
      cursor: default;
      user-select: none;
    }

    #signup:checked~label.login {
      color: #000;
    }

    #login:checked~label.signup {
      color: #000;
    }

    #login:checked~label.login {
      cursor: default;
      user-select: none;
    }

    .wrapper .form-container {
      width: 100%;
      overflow: hidden;
    }

    .form-container .form-inner {
      display: flex;
      width: 200%;
    }

    .form-container .form-inner form {
      width: 50%;
      transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .form-inner form .field {
      height: 50px;
      width: 100%;
      margin-top: 20px;
    }

    .form-inner form .field input {
      height: 100%;
      width: 100%;
      outline: none;
      padding-left: 15px;
      border-radius: 15px;
      border: 1px solid lightgrey;
      border-bottom-width: 2px;
      font-size: 17px;
      transition: all 0.3s ease;
    }

    .form-inner form .field input:focus {
      border-color: #1a75ff;
      /* box-shadow: inset 0 0 3px #fb6aae; */
    }

    .form-inner form .field input::placeholder {
      color: #999;
      transition: all 0.3s ease;
    }

    form .field input:focus::placeholder {
      color: #1a75ff;
    }

    .form-inner form .pass-link {
      margin-top: 5px;
    }

    .form-inner form .signup-link {
      text-align: center;
      margin-top: 30px;
    }

    .form-inner form .pass-link a,
    .form-inner form .signup-link a {
      color: #1a75ff;
      text-decoration: none;
    }

    .form-inner form .pass-link a:hover,
    .form-inner form .signup-link a:hover {
      text-decoration: underline;
    }

    form .btn {
      height: 50px;
      width: 100%;
      border-radius: 15px;
      position: relative;
      overflow: hidden;
    }

    form .btn .btn-layer {
      height: 100%;
      width: 300%;
      position: absolute;
      left: -100%;
      background: -webkit-linear-gradient(right,
          #003366,
          #004080,
          #0059b3,
          #0073e6);
      border-radius: 15px;
      transition: all 0.4s ease;
    }

    form .btn:hover .btn-layer {
      left: 0;
    }

    form .btn input[type="submit"] {
      height: 100%;
      width: 100%;
      z-index: 1;
      position: relative;
      background: none;
      border: none;
      color: #fff;
      padding-left: 0;
      border-radius: 15px;
      font-size: 20px;
      font-weight: 500;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="wrapper">
    <div class="title-text">
      <div class="title login">Login Form</div>
      <div class="title signup">Signup Form</div>
    </div>
    <div class="form-container">
      <div class="slide-controls">
        <input type="radio" name="slide" id="login" checked>
        <input type="radio" name="slide" id="signup">
        <label for="login" class="slide login">Login</label>
        <label for="signup" class="slide signup">Signup</label>
        <div class="slider-tab"></div>
      </div>
      <div class="form-inner">
        <form action="/auth/login" method="POST" class="login">
          <?php 
            if(isset($_SESSION['message']))
            {
              echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Oups!</strong> ' . $_SESSION['message'] . '
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';

              unset($_SESSION['message']);
            }
          ?>
          <div class="field">
            <input type="text" name="email" placeholder="Email Address" required>
          </div>
          <div class="field">
            <input type="password" name="password" placeholder="Password" required>
          </div>
          <div class="pass-link"><a href="#">Forgot password?</a></div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" value="Login">
          </div>
          <div class="signup-link">Not a member? <a href="#">Signup now</a></div>
        </form>


        <form action="/auth/register" method="POST" class="signup">
          <div class="field">
            <input type="text" name="username" placeholder="Username" required>
          </div>
          <div class="field">
            <input type="email" name="email" placeholder="Email Address" required>
          </div>
          <div class="field">
            <input type="password" name="password" placeholder="Password" required>
          </div>
          <div class="field">
            <input type="password" name="Cpassword" placeholder="Confirm password" required>
          </div>
          <div class="field">
            <select name="role" required>
              <option value="enseignant">enseignant</option>
              <option value="etudiant" selected>etudiant</option>
            </select>
          </div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" value="Signup">
          </div>
        </form>

      </div>
    </div>
  </div>
  <!-- partial -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    const loginText = document.querySelector(".title-text .login");
    const loginForm = document.querySelector("form.login");
    const loginBtn = document.querySelector("label.login");
    const signupBtn = document.querySelector("label.signup");
    const signupLink = document.querySelector("form .signup-link a");
    signupBtn.onclick = () => {
      loginForm.style.marginLeft = "-50%";
      loginText.style.marginLeft = "-50%";
    };
    loginBtn.onclick = () => {
      loginForm.style.marginLeft = "0%";
      loginText.style.marginLeft = "0%";
    };
    signupLink.onclick = () => {
      signupBtn.click();
      return false;
    };
  </script>

</body>

</html>