<?php
$_SESSION=array();
if (isset($_COOKIE["ID"])) {
    setcookie("ID", '', time() - 1800, '/');
}
session_destroy();
?>
<script type="text/javascript">
window.alert("ログアウトしました");
location.href="/index.html";
</script>
