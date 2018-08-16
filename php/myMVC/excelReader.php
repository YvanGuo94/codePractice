<?php
/**
 * Created by PhpStorm.
 * User: onehome_gyf
 * Date: 18/8/14
 * Time: 上午11:06
 */
require __DIR__.'/vendor/autoload.php';

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$sheet = $reader->load("/Users/onehome_gyf/Downloads/日本无证房源.xlsx");
$spreadsheet = $sheet->getSheet(0);
$highestRow = $spreadsheet->getHighestRow();
$highestColumn = $spreadsheet->getHighestColumn();
for ($row = 2; $row <= $highestRow; $row++) //行号从1开始
{
    echo $spreadsheet->getCell('A' . $row)->getValue().",";
}


