<?php
    error_reporting(0); // 設置錯誤報告等級為 0，禁用錯誤報告
    session_start(); // 啟動會話或恢復先前的會話
    if (!$_SESSION["id"]) { // 如果會話中沒有 "id" 變數
        echo "請登入帳號"; // 輸出請登入帳號的訊息
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 3秒後重新導向到 2.login.html 頁面
    }
    else{   
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust"); // 建立資料庫連結
        $sql="delete from bulletin where bid='{$_GET["bid"]}'"; // 刪除指定佈告編號的佈告
        #echo $sql; // 用於測試時打印 SQL 語句
        if (!mysqli_query($conn,$sql)){ // 如果執行 SQL 語句不成功
            echo "佈告刪除錯誤"; // 輸出佈告刪除錯誤的訊息
        }else{
            echo "佈告刪除成功"; // 輸出佈告刪除成功的訊息
        }
        echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>"; // 3秒後重新導向到 11.bulletin.php 頁面
    }
?>
