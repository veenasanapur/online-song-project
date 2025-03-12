<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <link rel="stylesheet" href="css/registrationpage.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<style>
    body {
        background-size: cover;
    }

    .post_login .navbar {
        background-color: rgba(15, 15, 15);
        position: fixed;
        display: flex;
        position: absolute;
        position: sticky;
        border-radius: 0px;

    }

    .post_login .navbar li {
        float: left;
        list-style: none;
        margin: 13px 20px;
        position: relative;
        left: 955px;

    }

    .post_login .navbar ul {
        margin: 2px;
    }

    .post_login .navbar li a {
        padding: 3px 3px;
        text-decoration: none;
        color: rgba(255, 255, 255, 0.644);
        font-size: 20px;
        background-color: #FF3CAC;
        background-image: linear-gradient(119deg, #FF3CAC 0%, #784BA0 50%, #2B86C5 100%);
        -webkit-text-fill-color: transparent;
        -webkit-background-clip: text;
        font-weight: 700px;
        font-size: 22px;
        font-weight: 700;
    }

    .post_login .navbar img {
        padding: 2px;
        margin: 10px 20px;
        width: 180px;
        height: 45px;
        margin-left: 10px;
        animation: animateBg 5s linear infinite;
    }

    @keyframes animateBg {
        100% {
            filter: hue-rotate(360deg);
        }
    }

    .post_login .navbar li a:hover {
        color: rgb(255, 255, 255);
    }
</style>

<body>
    <header class="post_login">
        <nav class="navbar">
            <img src="img/logo1.png" alt=""><span>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="about_page.php">ABOUT US</a></li>
                    <li><a href="login.php">LOGIN</a></li>
                    <!-- <?php if (isset($_SESSION['user'])) { ?>
                    <li><a href="users/all_songs.php">Songs</a></li>
                    <li><a href="users/admin_song_upload.php">Add Songs</a></li>
                    <li><a href="users/admin_artists.php">Artist</a></li>
                    <li><a href="#">Help</a></li>
                    <li><a href="log_out.php">Log_out</a></li>
            <?php } else { ?> -->

                        <!-- <?php } ?> -->
                </ul>
            </span>
        </nav>
    </header>

    <section>


        <div class="container">
            <div class="logo">
                <img src="./img/logo2.png" alt="">
            </div>
            <h1 class="form-title">Registration</h1>
            <form action="register_process.php" method="post">
                <div class="main-user-info">

                    <div class="user-input-box">
                        <label for="firstname">First name</label>
                        <input type="text" id="firstname" name="first_name" placeholder="Enter first name" required
                            placeholder="Enter first name" pattern="[A-Za-z].{2,}"
                            title="Only alphabets are accepted" />
                    </div>

                    <div class="user-input-box">
                        <label for="lastname">Last name</label>
                        <input type="text" id="lastname" name="last_name" placeholder="Enter last name" required
                            placeholder="Enter first name" pattern="[A-Za-z].{2,}"
                            title="Only alphabets are accepted" />
                    </div>

                    <div class="user-input-box">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter email" />
                    </div>

                    <div class="user-input-box">
                        <label for="phonenumber">Phone number</label>
                        <input type="number" id="phonenumber" name="phonenumber" placeholder="Enter phone number"
                            required />
                    </div>

                    <div class="user-input-box">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter password" required
                            placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                            title="You have to make strong password" />
                    </div>

                    <div class="user-input-box">
                        <label for="confirmpassword">Confirm password</label>
                        <input type="password" id="confirmpassword" name="confirmpassword"
                            placeholder="Confirm password" required placeholder="Password"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="You have to make strong password" />
                    </div>
                </div>
                <div class="gender-details-box">
                    <span class="gender-title">Gender</span>
                    <div class="gender-category">
                        <input type="radio" name="gender" id="male" value="male">
                        <label for="male">Male</label>

                        <input type="radio" name="gender" id="female" value="female">
                        <label for="female">Female</label>

                        <input type="radio" name="gender" id="other" value="other">
                        <label for="other">Other</label>
                    </div>
                </div>
                <div class="form-submit-btn" style="border-radius: 40px;">
                    <input type="submit" name="submit" value="Register" href="loginpage.php">
                </div>

            </form>
        </div>
    </section>



    <script>
        $('#cpassword').keyup(function () {
            var password = $('#password').val();
            if (password != $(this).val()) {
                $('#msg').html("password does not match");
            } else {
                $('#msg').html("");
            }
        })
        $(document).ready(function () {
            $('#password').keyup(function () {
                $('#result').html(checkStrength($('#password').val()))
            })

            function checkStrength(password) {
                var strength = 0
                if (password.length < 6) {
                    $('#result').removeClass()
                    $('#result').addClass('short text-danger')
                    return 'Too short'
                }
                if (password.length > 7) strength += 1
                // If password contains both lower and uppercase characters, increase strength value.
                if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
                // If it has numbers and characters, increase strength value.
                if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
                // If it has one special character, increase strength value.
                if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
                // If it has two special characters, increase strength value.
                if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
                // Calculated strength value, we can return messages
                // If value is less than 2
                if (strength < 2) {
                    $('#result').removeClass()
                    $('#result').addClass('weak text-danger')
                    return 'Weak'
                } else if (strength == 2) {
                    $('#result').removeClass()
                    $('#result').addClass('good text-primary')
                    return 'Good'
                } else {
                    $('#result').removeClass()
                    $('#result').addClass('strong text-success')
                    return 'Strong'
                }
            }
        });
    </script>
</body>

</html>