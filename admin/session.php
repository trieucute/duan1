<?php
if (!isset($_SESSION)) {
    session_start();
}

$_SESSION['user']['vai_tro'] = 'admin';
echo $_SESSION['user']['vai_tro'];

// session_destroy();