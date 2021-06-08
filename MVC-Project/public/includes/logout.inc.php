<?php

session_start();
session_unset();
session_destroy();
header("location: /MVC-Project/public/home");
exit(); 