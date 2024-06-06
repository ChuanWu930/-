<?php

error_reporting(0); // 設置錯誤報告等級為 0，禁用錯誤報告
session_start(); // 啟動會話或恢復先前的會話

if (!$_SESSION["id"]) { // 如果會話中沒有 "id" 變數
    echo "請登入帳號"; // 輸出請登入帳號的訊息
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 3秒後重新導向到 2.login.html 頁面
}
else{    

   // 建立資料庫連結
   $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
   
   // 從資料庫查詢資料，並插入新資料
   $sql="insert into user(id,pwd) values('{$_POST['id']}', '{$_POST['pwd']}')";
   
   // 如果查詢不成功
   if (!mysqli_query($conn, $sql)) {
     echo "新增命令錯誤"; // 輸出新增命令錯誤的訊息
   }
   else{
     echo "新增使用者成功，三秒鐘後回到網頁"; // 輸出新增使用者成功的訊息
     echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>"; // 3秒後重新導向到 18.user.php 頁面
   }
}
?>
