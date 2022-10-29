<?php
// удаляем cookie - удаляем время жизни 
setcookie('log', '', time() - 3600 * 24 * 30, "/");
