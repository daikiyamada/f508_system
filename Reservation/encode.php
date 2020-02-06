<?php
function e($str, $charset = 'UTF-8'){
    print htmlspecialchars($str, ENT_QUOTES, $charset);
}
?>