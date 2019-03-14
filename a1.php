<?php
$dbms='mysql';   //数据库类型
$host='localhost';  //主机地址
$dbName='school';  //数据库名
$user='root';  //数据库库账号
$pass='root'; //数据库密码
$dsn="$dbms:host=$host;dbname=$dbName";
// 拼接数据库信息
try {
    $dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
    echo "连接成功<br/>";

    // join
    $sql = "SELECT * from student where id=1";
    foreach ($dbh->query($sql) as $v)
    {
        var_dump($v);
        // 转换成json  json 是最常用的序列化方式  我们一般传给前端 都是这种格式 是个字符串
        //echo json_encode($v,JSON_UNESCAPED_UNICODE);
    }


} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}
//默认这个不是长连接，如果需要数据库长连接，需要最后加一个参数：array(PDO::ATTR_PERSISTENT => true) 变成这样：
$db = new PDO($dsn, $user, $pass, array(PDO::ATTR_PERSISTENT => true));
