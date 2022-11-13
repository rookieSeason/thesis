<?php

require_once 'includes/conn.php';
session_start();
session_unset();
session_destroy();

header('location:userData/multi-user-login.php');