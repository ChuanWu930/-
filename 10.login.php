<?php
   // mysqli_connect() 建立資料庫連結
   $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust"); // 連接到資料庫
   
   // mysqli_query() 從資料庫查詢資料
   $result=mysqli_query($conn, "select * from user"); // 從資料庫中查詢所有用戶資料
   
   // mysqli_fetch_array() 從查詢出來的資料一筆一筆抓出來
   $login=FALSE; // 初始化變量，標示是否成功登入
   while ($row=mysqli_fetch_array($result)) { // 循環遍歷查詢結果
     if (($_POST["id"]==$row["id"]) && ($_POST["pwd"]==$row["pwd"])) { // 比對使用者輸入的ID和密碼
       $login=TRUE; // 如果匹配，設置登入標誌為 TRUE
     }
   } 
   
   if ($login==TRUE) { // 如果登入成功
    session_start(); // 開始一個新的會話
    $_SESSION["id"]=$_POST["id"]; // 將用戶 ID 保存到會話中
    echo "登入成功"; // 顯示登入成功訊息
    echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>"; // 3秒後重定向到 bulletin 頁面
   } else { // 如果登入失敗
    echo "帳號/密碼 錯誤"; // 顯示錯誤訊息
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 3秒後重定向到登入頁面
  }
?>
