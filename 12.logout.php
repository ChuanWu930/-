<?php
    session_start(); // 啟動會話或恢復先前的會話
    unset($_SESSION["id"]); // 移除會話中的 "id" 變數
    echo "登出成功...."; // 輸出登出成功的訊息
    echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>"; // 3秒後重新導向到 2.login.html 頁面

?>
