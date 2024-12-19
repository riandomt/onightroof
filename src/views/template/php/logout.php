<?php
session_destroy();
$_SESSION = array();
header("Location: /onightroof/signIn");