<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - ToneVault</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #2a0057, #1a0033);
            background-image: url(./app/assets/images/banner-bg.jpg);
            background-repeat: round;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }


        .login-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
            text-align: center;
            max-width: 400px;
            width: 100%;
            backdrop-filter: blur(40px);
            margin-bottom: 40px;
            /* Ensure space between form and footer */
        }

        .login-container img {
            width: 200px;
            margin-bottom: 10px;
        }

        .login-container h1 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #d1c4e9;
        }

        .login-container label {
            display: block;
            margin: 15px 0 5px;
            font-size: 0.9rem;
            color: #d1c4e9;
            text-align: left;
        }

        .login-container input {
            width: 93%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            font-size: 1rem;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            outline: none;
        }

        .login-container input::placeholder {
            color: #ccc;
        }

        .login-container button {
            width: 100%;
            padding: 12px;
            margin-top: 30px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            background: linear-gradient(90deg, #7b1fa2, #ba68c8);
            color: #fff;
            cursor: pointer;
            transition: transform 0.3s ease, background 0.3s ease;
            box-sizing: border-box;
            /* Ensure consistent sizing */
        }

        .login-container button:hover {
            transform: scale(1.05);
            background: linear-gradient(90deg, #6a0080, #9c27b0);
        }

        .social-login {
            margin-top: 20px;
        }

        .social-login p {
            font-size: 0.9rem;
            color: #b39ddb;
        }

        .social-login a {
            text-decoration: none;
            color: #fff;
            margin: 0 10px;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .social-login a:hover {
            color: #d1c4e9;
        }

        .error {
            color: #ff6b6b;
            font-size: 0.9rem;
            margin-bottom: 15px;
        }

        footer {
            margin-top: 0px;
            /* Push the footer to the bottom */
            color: #b39ddb;
            font-size: 0.8rem;
            text-align: center;
            width: 100%;
            padding: 10px 0;
        }

        footer a {
            color: #d1c4e9;
            text-decoration: none;
        }


        .error{
            color:red;
            font-size: 18px;
        }

        footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .login-container {
                padding: 30px;
            }

            .login-container h1 {
                font-size: 1.5rem;
                color: #9c27b0;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <img src="app/assets/images/logo/logoW.png" alt="ToneVault Logo">
        <h1 style="color:#fff">Sign up</h1>
        <?php if (isset($error)): ?>
            <h1 class="error"><?= htmlspecialchars($error) ?></h1>
        <?php endif; ?>
        <form action="signup/register" method="POST">

            <label for="nome">Username</label>
            <input type="text" name="nome" id="nome" placeholder="Enter your username" required>

            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>

            <label for="cpassword">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" required>
            <label for="password">Confirm Password</label>
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm your password" required>


            <button type="submit">Sign up</button>
        </form>
        <div class="social-login">
            <p>Already have an Account? <a href="/" style="color:#d1c4e9"> Log in</a>
            </p>

        </div>
    </div>
    <footer>
        <p>&copy; 2024 ToneVault | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
    </footer>
</body>

</html>