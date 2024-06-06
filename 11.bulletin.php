<?php
    error_reporting(0); // 關閉錯誤報告
    session_start(); // 開始一個會話
    if (!$_SESSION["id"]) { // 如果會話中沒有用戶 ID，表示未登入
        echo "請先登入"; // 提示用戶先登入
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 3 秒後跳轉到登入頁面
    }
    else { // 如果會話中有用戶 ID，表示已登入
        echo "歡迎, ".$_SESSION["id"]."[<a href=12.logout.php>登出</a>] [<a href=18.user.php>管理使用者</a>] [<a href=22.bulletin_add_form.php>新增佈告</a>]<br>"; // 顯示歡迎訊息和功能鏈接
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust"); // 連接到資料庫
        $result=mysqli_query($conn, "select * from bulletin"); // 查詢所有佈告
        echo "<table border=2><tr><td></td><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>"; // 顯示表格標頭
        while ($row=mysqli_fetch_array($result)) { // 循環遍歷查詢結果
            echo "<tr><td><a href=26.bulletin_edit_form.php?bid={$row["bid"]}>修改</a> 
            <a href=28.bulletin_delete.php?bid={$row["bid"]}>刪除</a></td><td>"; // 顯示修改和刪除鏈接
            echo $row["bid"]; // 顯示佈告編號
            echo "</td><td>";
            echo $row["type"]; // 顯示佈告類別
            echo "</td><td>"; 
            echo $row["title"]; // 顯示佈告標題
            echo "</td><td>";
            echo $row["content"]; // 顯示佈告內容
            echo "</td><td>";
            echo $row["time"]; // 顯示發佈時間
            echo "</td></tr>";
        }
        echo "</table>"; // 結束表格
    }
?>
