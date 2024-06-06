<html>
    <head><title>修改使用者</title></head> <!-- 設置頁面標題 -->
    <body>
    <?php
    error_reporting(0); // 關閉錯誤報告
    session_start(); // 開始一個會話
    if (!$_SESSION["id"]) { // 如果會話中沒有用戶 ID，表示未登入
        echo "請登入帳號"; // 提示用戶先登入
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 3 秒後跳轉到登入頁面
    }
    else { // 如果會話中有用戶 ID，表示已登入
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust"); // 連接到資料庫
        $result=mysqli_query($conn, "select * from user where id='{$_GET['id']}'"); // 查詢要修改的用戶資料
        $row=mysqli_fetch_array($result); // 從查詢結果中獲取用戶資料
        echo "
        <form method=post action=20.user_edit.php> <!-- 創建表單，用於提交修改用戶的請求 -->
            <input type=hidden name=id value={$row['id']}> <!-- 隱藏輸入，用於傳遞用戶 ID -->
            帳號：{$row['id']}<br>  // 顯示用戶帳號
            密碼：<input type=text name=pwd value={$row['pwd']}><p></p> <!-- 輸入新的密碼 -->
            <input type=submit value=修改> <!-- 提交按鈕 -->
        </form>
        ";
    }
    ?>
    </body>
</html>
