<?php
require_once 'admin/core/init.php';
session_destroy();
unset($_SESSION['username']);
Redirect::to('login');