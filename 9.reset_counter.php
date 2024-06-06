<?php
    // 啟動 session
    session_start();
    
    // 刪除 session 中的 counter 變數
    unset($_SESSION["counter"]);
    
    // 輸出重置成功的訊息
    echo "counter重置成功....";
    
    // 重定向到計數器頁面，延遲 2 秒後重新導向
    echo "<meta http-equiv=REFRESH content='2; url=8.counter.php'>";
?>
