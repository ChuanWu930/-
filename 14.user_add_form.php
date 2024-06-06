<html>
    <head><title>新增使用者</title></head> <!-- 設置頁面標題 -->
    <body>
<?php        
    error_reporting(0); // 關閉錯誤報告
    session_start(); // 開始一個會話
    if (!$_SESSION["id"]) { // 如果會話中沒有用戶 ID，表示未登入
        echo "請登入帳號"; // 提示用戶先登入
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 3 秒後跳轉到登入頁面
    }
    else { // 如果會話中有用戶 ID，表示已登入
        echo "
            <form action=15.user_add.php method=post> <!-- 創建表單，用於提交新增用戶的請求 -->
                帳號：<input type=text name=id><br> <!-- 輸入帳號 -->
                密碼：<input type=text name=pwd><p></p> <!-- 輸入密碼 -->
                <input type=submit value=新增> <input type=reset value=清除> <!-- 提交和重置按鈕 -->
            </form>
        ";
    }
?>
    </body>
</html>
