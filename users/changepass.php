<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password  page</title>
    <link rel="stylesheet" href="../css/c_pass.css">
  
    
</head>
<body>
<?php

require_once("../files/header.php");
include 'nevbar.php'; ?>
    <section>
        <div class="login-box">
            <form action="update_pass.php" method="POST">
                <!-- <div class="logo">
                <img src="./logo2.png" alt="">
                </div> -->
             
                <h2>Change password</h2>
                
                <div class="input-box">
                <!-- <span class="icon"><ion-icon name="lock-closed"></ion-icon></span> -->
                    <input type="password" name="opass" id="opass"required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
                    <label>Current Password</label>
                    </div>

                    <div class="input-box">
                    <!-- <span class="icon"><ion-icon name="lock-closed"></ion-icon></span> -->
                        <input type="password" name="npass" id="npass"required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
                        <label>New Password</label>
                        </div>
                    
                    <div class="input-box">
                        <!-- <span class="icon"><ion-icon name="lock-closed"></ion-icon></span> -->
                        <input type="password"  name="cpass" id="cpass" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
                        <label>Confirm password</label> 
                        </div>
                            <div class="form-submit-btn">
                            <button type="submit" name="submit" id="submit "style="border-radius: 40px;">Submit</button>
    </div>
                                </form>
                                </div>
                                </section>
                                <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
                                <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
                                
                               
                                </body>
                                </html>