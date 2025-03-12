<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style>
        /* body{
               
                background: url('./reg_bg.jpg');
                height: 100%;
                background-size: cover;
                
            } */

        /* .tab~h2{
                border:3px solid white;
                top:100px;
                color: white;
                display: flex;
                justify-content: center;
                align-items: center;
                
            } */
    </style>
</head>


<body>
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message']['type'] ?>  m-3">
            <?php
            echo ($_SESSION['message']['body']);
            unset($_SESSION['message']);
            ?>
        </div>
    <?php }
    include 'files/header.php';
    include 'nevbar.php'; ?>
    <div class="container pt-2 pt-md-5">

        <div class="row">
            <div class="col-md-6 mt-2 tab">
                <h2 class="text-center text-dark mb-2">Register</h2>
                <form action="register_process.php" method="post">
                    <div class="row">
                        <div class="col">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required=""
                                placeholder="Enter first name" pattern="[A-Za-z].{2,}"
                                title="Only alphabets are accepted">

                        </div>
                        <div class="col">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control " id="last_name" name="last_name" required=""
                                placeholder="Enter last name" pattern="[A-Za-z].{2,}"
                                title="Only alphabets are accepted">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="username" name="email" required=""
                                placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="Password">Password</label>
                            <!-- <input type="password" minlength="8" maxlength="12" required title="8 to 12 characters"  -->
                            <input type="password" class="form-control" id="password" name="password" required=""
                                placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                                title="You have to make strong password">
                            <p id="result" class="text-danger"></p>
                        </div>
                        <div class="col">
                            <label for="Password">Confirm Password</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword" required=""
                                placeholder="Confirm Password">
                            <!-- <p id="msg"></p> -->
                        </div>
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary float-right mt-2">Register</button>
                </form>
            </div>

        </div>
    </div>
    <!-- <?php include './files/footer.php' ?> -->
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