<?php
    error_reporting(0); // 設置錯誤報告等級為 0，禁用錯誤報告
    session_start(); // 啟動會話或恢復先前的會話
    if (!$_SESSION["id"]) { // 如果會話中沒有 "id" 變數
        echo "please login first"; // 輸出請先登入的訊息
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 3秒後重新導向到 2.login.html 頁面
    }
    else{
        echo "
        <html>
            <head><title>新增佈告</title></head> <!-- 設置頁面標題 -->
            <body>
                <form method=post action=23.bulletin_add.php> <!-- 設置表單提交方法為 POST，表單提交地址為 23.bulletin_add.php -->
                    標    題：<input type=text name=title><br> <!-- 標題輸入框 -->
                    內    容：<br><textarea name=content rows=20 cols=20></textarea><br> <!-- 內容文本區 -->
                    佈告類型：<input type=radio name=type value=1>系上公告  <!-- 佈告類型選擇：系上公告 -->
                            <input type=radio name=type value=2>獲獎資訊 <!-- 佈告類型選擇：獲獎資訊 -->
                            <input type=radio name=type value=3>徵才資訊<br> <!-- 佈告類型選擇：徵才資訊 -->
                    發布時間：<input type=date name=time><p></p> <!-- 發布時間選擇 -->
                    <input type=submit value=新增佈告> <input type=reset value=清除> <!-- 提交按鈕和重置按鈕 -->
                </form>
            </body>
        </html>
        ";
    }
?>
