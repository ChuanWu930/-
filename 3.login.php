<?php 
    if (($_POST["id"] == "john") && ($_POST["pwd"]=="john1234")) // 檢查用戶名和密碼是否為 "john" 和 "john1234"
        echo "登入成功"; // 如果匹配，輸出 "登入成功"
    else
        echo "登入失敗"; // 如果不匹配，輸出 "登入失敗"
?>
