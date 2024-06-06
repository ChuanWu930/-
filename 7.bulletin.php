<?php
    // 關閉錯誤報告
    error_reporting(0);
    
    // 建立資料庫連線
    $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
    
    // 從資料庫中選擇所有佈告
    $result=mysqli_query($conn, "select * from bulletin");
    
    // 輸出佈告內容到表格中
    echo "<table border=2><tr><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";
    while ($row=mysqli_fetch_array($result)){
        echo "<tr><td>";
        echo $row["bid"];
        echo "</td><td>";
        echo $row["type"];
        echo "</td><td>"; 
        echo $row["title"];
        echo "</td><td>";
        echo $row["content"]; 
        echo "</td><td>";
        echo $row["time"];
        echo "</td></tr>";
    }
    echo "</table>"
?>
