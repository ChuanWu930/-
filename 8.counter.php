<?php
    // 啟動 session
    session_start();
    
    // 如果 counter 不存在，則設置為 1
    if (!isset($_SESSION["counter"]))
        $_SESSION["counter"]=1;
    else
        // 否則將 counter 加 1
        $_SESSION["counter"]++;

    // 輸出 counter 值
    echo "counter=".$_SESSION["counter"];
    
    // 提供連結以重置 counter
    echo "<br><a href=9.reset_counter.php>重置counter</a>";
?>
