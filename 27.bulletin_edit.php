<?php
    error_reporting(0); // 設置錯誤報告等級為 0，禁用錯誤報告
    session_start(); // 啟動會話或恢復先前的會話
    if (!$_SESSION["id"]) { // 如果會話中沒有 "id" 變數
        echo "請登入帳號"; // 輸出請登入帳號的訊息
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 3秒後重新導向到 2.login.html 頁面
    }
    else{   
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust"); // 建立資料庫連結
        if (!mysqli_query($conn, "update bulletin set title='{$_POST['title']}',content='{$_POST['content']}',time='{$_POST['time']}',type={$_POST['type']} where bid='{$_POST['bid']}'")){ // 更新佈告資料
            echo "修改錯誤"; // 輸出修改錯誤的訊息
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>"; // 3秒後重新導向到 11.bulletin.php 頁面
        }else{
            echo "修改成功，三秒鐘後回到佈告欄列表"; // 輸出修改成功的訊息
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>"; // 3秒後重新導向到 11.bulletin.php 頁面
        }
    }
?>
