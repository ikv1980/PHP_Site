<?php
// удаляем cookie - удаляем время жизни 
setcookie('login', '', time() - 3600 * 24 * 30, "/");
unset($_COOKIE['login']);
