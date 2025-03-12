<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="./css/loginpage.css">
    
</head>
<body>
<?php

require_once("files/header.php");
include 'nevbar.php'; ?>
    <section>
     
        <div class="login-box">
            <form action="login_process.php" method="POST">
            <div class="logo">
            <img src="./img/logo2.png" alt="">
</div>
               
             
                <h2>Login</h2>
                
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="text" name="username" id="username"required pattern="[A-Za-z._]{2,}" title="Only alphabets are accepted">
                    <label>User name</label>
                    </div>
                    
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password"  name="password" id="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="You have to make strong password">
                        <label>Password</label> 
                        </div>
                        
                        <div class="remember-forgot">
                            <label><input type="checkbox">Remember me</label>
                            </div>
                            
                            <button type="submit" name="submit" id="submit" style="border-radius: 40px;">Login</button>
                            <div class="register-link">
                                <p>Don't have an account? <a href="register.php">Register</a></p>
                                </div>
                                <div class="register-link">
                                <p><a href="admin/">Admin</a></p>
                                </div>
                                </form>
                                </div>
                                </section>
                                <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
                                <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
                                
                               
                                </body>
                                </html>