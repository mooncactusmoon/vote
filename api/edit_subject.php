<!-- 編輯題目 -->
<?php
include_once "db.php";
/**
 * 資料表的欄位名稱=>資料內容
 */
$topic = $_POST['topic'];
$sql = "SELECT * FROM `topics` WHERE `topic`='{$_POST['topic']}'";
$result = $pdo->query($sql)->fetch();

$topic_id = $_POST['topic_id'];

update('topics', ['topic' => $topic], ['id' => $topic_id]);

$options = $_POST['options'];
$opt_id = $_POST['opt_id'];


foreach ($options as $key => $opt) {
    //晴天 as 0 => 晴天
    //雨天 as 1 => 雨天
    //陰天 as 2 => 陰天
    //未知 as 3 => 未知
    //颱風 as 4 => 颱風 (新增選項，沒有$opt_id)


    if ($opt_id[$key]) { //因為新添加的選項不會有opt_id，而舊的選項有四個，就只會有四個opt_id
        update('options', ['opt' => $opt], ['id' => $opt_id[$key]]);
    } else if ($opt) { //剩下就是有opt但是沒有opt_id的新選項
        $arr = ['opt' => $opt, 'topic_id' => $topic_id];

        insert('options', $arr);
    }
}
$_SESSION['ok'] = "投票問卷已更新";

to("../backend/?do=edit_subject&&id=$topic_id");

?>