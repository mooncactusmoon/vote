# 資料庫程式設計作業

## 投票系統
**請建立一個投票系統可以提供投票功能，並能查看投票的結果**

### 動作要求
1. 分析需要的功能
    * 首頁
        1. **上方的narbar 及 header圖**
            * 點 LOGO 可回到前台投票列表頁面
            * 中間顯示動作提示文字
            * 登入後，最右邊出現登出按鈕
            * 前後台頁面用的header圖色調不同，點選header圖可回到前台或後台首頁
        2. **左側sidebar**
            * 尚未登入前呈現登入輸入表，下方可點選註冊新會員
            * 登入後，呈現*投票表列*、*新增投票*、*會員管理*
            * 若是管理員登入，會再出現*投票管理*、*廣告管理*
        3. **右側廣告區**
            * 依照管理員設定去呈現廣告圖
            * 管理員可新增、修改、上/下架、刪除廣告圖
        4. **中間主區域**
            * 首頁時呈現投票列表，可觀看投票結果
            * 登入者可經由點選投票題目而跳轉至投票頁面
            * 隨著功能點選呈現不同畫面
        5. **最下方footer**
            * 目前只有版權宣告

    * 各自功能 (一般使用者只能看到前台，管理者才能看到後台)
        1. **前台 - 註冊新會員**
            * 帳號/密碼限定至少八位元以上，帳號及信箱不可重複
            * 防止會員留下空白資料
        2. **前台 - 投票頁面**
            * 每個都是單選題目
            * 投票後跳轉至結果頁面
            * 若已投過，則無法點開該投票問卷
        3. **前台 - 投票結果頁面**
            * 顯示投票標題、投票總人數、投票選項名稱及各自票數
        4. **前台 - 新增問卷**
            * 投票標題及選項不可空白
            * 可動態新增/刪減選項數量框框
            * 新增完成後跳回後台首頁
        5. **前台 - 會員管理**
            * 會預先載入個人資料
            * 除了帳號其他都可更改
            * 確認送出後會跳更新成功提醒並回到原頁可確認是否改的資料正確
            * 最下面有回到首頁按鍵

        ---一般使用者就算輸入網址也無法進入後台頁面---
        
        6. **後台 - 首頁呈現投票列表**
            * 投票列表無提供連結功能
            * 投票列表多了管理按鈕及新增問卷按鈕
        7. **後台 - 投票問卷管理編輯**
            * 可新增選項或修改選項內文
            * 刪除時會跳出第二次確認按鈕
            * 按下送出鈕會回到編輯頁面，並且顯示「投票問卷已更新」
        8. **後台 - 廣告管理**
            * 只有管理員看的到這功能
            * 標題下面可上傳圖片及說明文字，上傳成功後跳出成功提示並回原頁
            * 下半部呈現已有廣告的「圖片縮圖」、「說明」、「狀態(是否上架中)」、「管理(修改/刪除)」
            * 修改廣告圖可重新上傳圖片及更新說明
            * 欲刪除廣告不會跳出第二次提醒，會直接刪掉
            
2. 設計資料表
    * 資料表一(資料表名)
        |欄位名|資料型態|主鍵|預設值|自動遞增|備註|
        |---|---|---|---|---|---|
        |||||||
        |||||||
    * 資料表二(資料表名)
        |欄位名|資料型態|主鍵|預設值|自動遞增|備註|
        |---|---|---|---|---|---|
        |||||||
        |||||||
    
3. 請充分運用學到的各項網頁知識來美化這個投票系統的畫面
    * html標籤的應用(語意標籤、表單、表格、分隔線、標頭..etc)
    * css的應用(行內、內嵌、外連、flexbox、偽元素、動畫..etc)
    * bootstrap的應用(排版功能、元件、類別..etc)
    * javascript or jQuery的應用(DOM的操作、CSS的切換)

4. 請上傳至220的伺服器個人空間，並自行建立所需資料表


### 必備要求
**後台功能**
* 請設計一個頁面可以用來輸入投票的題目
* 可以控制題目的啟用與關閉

**前台功能**
* 請設計一個頁面可以看到目前進行投票的項目
* 可以進行投票
* 請設計一個頁面可以看到投票統計的結果

**進階功能**
* 請整合註冊及登入系統
* 能以長條圖或圖像化的方式來呈現統計的結果
* 能判斷使用者的狀態，避免重覆投票

## 評量時間
2021-12-24(星期五)