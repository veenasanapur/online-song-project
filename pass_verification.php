<?php
$password="$2y$10$giKsJBSYpKIjuVFoKsjAGO62aaqTPyo44B1FqRBJNyilR/BLRptVC";
$v= password_verify($password);
echo "$v";