<?php
/**
 * Created by PhpStorm.
 * User: onehome_gyf
 * Date: 18/4/17
 * Time: 上午10:15
 */

require __DIR__ . "/mysql/ConnManager.php";

use ScriptProject\Mysql\ConnManager;

/** @var \PDO $connection */
$connection = ConnManager::singleton()->getConnection('local');


$sql = "select COLUMN_NAME from INFORMATION_SCHEMA.Columns where table_name='house' and table_schema='onehomeHouseFromDida'";

$stmt = $connection->prepare($sql);
$stmt->execute();

$rows1 = $stmt->fetchAll(\PDO::FETCH_ASSOC);
$rows1 = array_column($rows1,'COLUMN_NAME');

$sql = "select COLUMN_NAME from INFORMATION_SCHEMA.Columns where table_name='house' and table_schema='onehome'";

$stmt = $connection->prepare($sql);
$stmt->execute();

$rows2 = $stmt->fetchAll(\PDO::FETCH_ASSOC);
$rows2 = array_column($rows2,'COLUMN_NAME');

$diff12 = array_diff($rows1,$rows2);
$diff21 = array_diff($rows2,$rows1);

print_r($diff12);
print_r($diff21);



//事务例子
try {
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $connection->beginTransaction();
    $connection->exec("");
    $connection->exec("");
    $connection->commit();

} catch (Exception $e) {
    $connection->rollBack();
    echo "Failed: " . $e->getMessage();
}


/*$sql = sprintf('select count(*) from house where status=3 and hasdeleted=0 and levelid1=20150436');
$stmt = $connection->prepare($sql);
$stmt->execute();

$rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

print_r($rows);*/
//
//$sql = sprintf('select count(*) from house where status=3 and hasdeleted=0');
//$stmt = $connection->prepare($sql);
//$stmt->execute();
//
//$rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
//
//$sql = 'select count(*) from ';
//
//print_r($rows);