<?php
session_start();
unset($_SESSION['Maanger']);
?>
<script type="text/javascript">
window.alert("ログアウトしました");
location.href="/index.html";
</script>
