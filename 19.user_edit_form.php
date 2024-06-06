<html>
<head><title>修改使用者</title></head>
<body>
<?php
error_reporting(0); // 設置錯誤報告等級為 0，禁用錯誤報告
session_start(); // 啟動會話或恢復先前的會話
if (!$_SESSION["id"]) { // 如果會話中沒有 "id" 變數
    echo "請登入帳號"; // 輸出請登入帳號的訊息
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 3秒後重新導向到 2.login.html 頁面
}
else{   
    $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust"); // 建立資料庫連結
    $result=mysqli_query($conn, "select * from user where id='{$_GET['id']}'"); // 從資料庫中選擇指定 ID 的使用者資料
    $row=mysqli_fetch_array($result); // 從查詢結果中獲取一行作為關聯數組
    echo "
    <form method=post action=20.user_edit.php> <!-- 設置表單提交方法為 POST，表單提交地址為 20.user_edit.php -->
        <input type=hidden name=id value={$row['id']}> <!-- 隱藏的表單欄位，用於傳遞使用者 ID -->
        帳號：{$row['id']}<br>  <!-- 顯示使用者帳號 -->
        密碼：<input type=text name=pwd value={$row['pwd']}><p></p> <!-- 密碼輸入框，預填使用者密碼 -->
        <input type=submit value=修改> <!-- 提交按鈕 -->
    </form>
    ";
}
?>
</body>
</html>
