<?php
    error_reporting(0); // 設置錯誤報告等級為 0，禁用錯誤報告
    session_start(); // 啟動會話或恢復先前的會話
    if (!$_SESSION["id"]) { // 如果會話中沒有 "id" 變數
        echo "please login first"; // 輸出請先登入的訊息
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 3秒後重新導向到 2.login.html 頁面
    }
    else{
        
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust"); // 建立資料庫連結
        $result=mysqli_query($conn, "select * from bulletin where bid={$_GET["bid"]}"); // 從資料庫中選擇指定佈告編號的佈告資料
        $row=mysqli_fetch_array($result); // 從查詢結果中獲取一行作為關聯數組
        $checked1=""; // 用於判斷是否選中系上公告的變數
        $checked2=""; // 用於判斷是否選中獲獎資訊的變數
        $checked3=""; // 用於判斷是否選中徵才資訊的變數
        if ($row['type']==1) // 如果佈告類型為系上公告
            $checked1="checked"; // 將系上公告設置為選中狀態
        if ($row['type']==2) // 如果佈告類型為獲獎資訊
            $checked2="checked"; // 將獲獎資訊設置為選中狀態
        if ($row['type']==3) // 如果佈告類型為徵才資訊
            $checked3="checked"; // 將徵才資訊設置為選中狀態
        echo "
        <html>
            <head><title>新增佈告</title></head> <!-- 設置頁面標題 -->
            <body>
                <form method=post action=27.bulletin_edit.php> <!-- 設置表單提交方法為 POST，表單提交地址為 27.bulletin_edit.php -->
                    佈告編號：{$row['bid']}<input type=hidden name=bid value={$row['bid']}><br> <!-- 顯示佈告編號並設置一個隱藏的表單欄位用於傳遞佈告編號 -->
                    標    題：<input type=text name=title value={$row['title']}><br> <!-- 標題輸入框並預填佈告標題 -->
                    內    容：<br><textarea name=content rows=20 cols=20>{$row['content']}</textarea><br> <!-- 內容文本區並預填佈告內容 -->
                    佈告類型：<input type=radio name=type value=1 {$checked1}>系上公告  <!-- 佈告類型選擇：系上公告 -->
                            <input type=radio name=type value=2 {$checked2}>獲獎資訊 <!-- 佈告類型選擇：獲獎資訊 -->
                            <input type=radio name=type value=3 {$checked3}>徵才資訊<br> <!-- 佈告類型選擇：徵才資訊 -->
                    發布時間：<input type=date name=time value={$row['time']}><p></p> <!-- 發布時間選擇並預填佈告發布時間 -->
                    <input type=submit value=修改佈告> <input type=reset value=清除> <!-- 提交按鈕和重置按鈕 -->
                </form>
            </body>
        </html>
        ";
    }
?>
