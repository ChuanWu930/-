<html>
<head><title>使用者管理</title></head>
<body>
<?php
    error_reporting(0); // 設置錯誤報告等級為 0，禁用錯誤報告
    session_start(); // 啟動會話或恢復先前的會話
    if (!$_SESSION["id"]) { // 如果會話中沒有 "id" 變數
        echo "請登入帳號"; // 輸出請登入帳號的訊息
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 3秒後重新導向到 2.login.html 頁面
    }
    else{   
        echo "<h1>使用者管理</h1>
            [<a href=14.user_add_form.php>新增使用者</a>] [<a href=11.bulletin.php>回佈告欄列表</a>]<br>
            <table border=1>
                <tr><td></td><td>帳號</td><td>密碼</td></tr>";
        
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust"); // 建立資料庫連結
        $result=mysqli_query($conn, "select * from user"); // 從資料庫查詢所有使用者資料
        while ($row=mysqli_fetch_array($result)){ // 迭代處理每一行資料
            echo "<tr><td><a href=19.user_edit_form.php?id={$row['id']}>修改</a>||<a href=17.user_delete.php?id={$row['id']}>刪除</a></td><td>{$row['id']}</td><td>{$row['pwd']}</td></tr>"; // 輸出每一行資料的編輯和刪除連結以及帳號和密碼
        }
        echo "</table>"; // 輸出表格結束標籤
    }
?> 
</body>
</html>
