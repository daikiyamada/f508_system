<?php
session_start();
unset($_SESSION['Manager']);
?>
<script type="text/javascript">
window.alert("ログアウトしました");
location.href="/index.html";
</script>
