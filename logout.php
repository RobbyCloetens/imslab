<?php
// optie als er nog tijd is om dit te doen
require_once 'core/init.php';

$user = new User();
$user->logout();

Redirect::to('index.php');