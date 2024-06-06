<?php
    error_reporting(0); // 關閉錯誤報告
    session_start(); // 開始一個會話
    if (!$_SESSION["id"]) { // 如果會話中沒有用戶 ID，表示未登入
        echo "請登入帳號"; // 提示用戶先登入
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 3 秒後跳轉到登入頁面
    }
    else { // 如果會話中有用戶 ID，表示已登入
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust"); // 連接到資料庫
        $sql="delete from user where id='{$_GET["id"]}'"; // 構建 SQL 刪除用戶的語句
        #echo $sql; // 打印 SQL 語句，用於測試
        if (!mysqli_query($conn,$sql)){ // 執行 SQL 語句，如果執行失敗
            echo "使用者刪除錯誤"; // 提示使用者刪除錯誤
        } else { // 如果執行成功
            echo "使用者刪除成功"; // 提示使用者刪除成功
        }
        echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>"; // 3 秒後跳轉到管理使用者頁面
    }
