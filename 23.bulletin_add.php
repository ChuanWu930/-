<?php
    error_reporting(0); // 設置錯誤報告等級為 0，禁用錯誤報告
    session_start(); // 啟動會話或恢復先前的會話
    if (!$_SESSION["id"]) { // 如果會話中沒有 "id" 變數
        echo "please login first"; // 輸出請先登入的訊息
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 3秒後重新導向到 2.login.html 頁面
    }
    else{
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust"); // 建立資料庫連結
        $sql="insert into bulletin(title, content, type, time) 
        values('{$_POST['title']}','{$_POST['content']}', {$_POST['type']},'{$_POST['time']}')"; // 新增佈告的 SQL 語句
        if (!mysqli_query($conn, $sql)){ // 如果執行 SQL 語句不成功
            echo "新增命令錯誤"; // 輸出新增命令錯誤的訊息
        }
        else{
            echo "新增佈告成功，三秒鐘後回到網頁"; // 輸出新增佈告成功的訊息
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>"; // 3秒後重新導向到 11.bulletin.php 頁面
        }
    }
?>
