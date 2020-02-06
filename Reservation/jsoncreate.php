<?php

require_once 'Manager.php';
require_once 'encode.php';

// initialization for column
$arryCol = array();
array_push($arryCol, MakeColElement('reserveID', 'number'));
array_push($arryCol, MakeColElement('date', 'number'));
array_push($arryCol, MakeColElement('class', 'number'));
array_push($arryCol, MakeColElement('ID', 'number'));
array_push($arryCol, MakeColElement('purpose', 'number'));

$arryRow = array();

// query data
$qry = "select * from Reservation";
try
{
    $db = connect();
    $stt = $db->prepare($qry);
    $stt->execute();

    // loop till fetch all aquired values and store.
    while($row = $stt->fetch(PDO::FETCH_ASSOC)) {
      array_push($arryRow, MakeRowElement($row['reserveID'], $row['date'], $row['class']));
    }

    // delete
    $db = NULL;
}
catch (PDOEXception $e)
{
    die("connection error:{$e->getMessage()}");
}

// return created Json format.
echo MakeTable($arryCol, $arryRow);

function MakeColElement ($label, $type)
{
  return '{"id":"","label":"'.$label.'"'.',"pattern":"","type":"'.$type.'"'.'}';
}

function MakeRowElement ($item, $val)
{
  return '{"c":[{"v":"'.$item.'","f":null},{"v":'.$val.',"f":null}]}';
}

function MakeTable ($arryCol, $arryRow)
{
  $ret = '{
          "cols": ['
          .ConnectArry($arryCol)
          .'],'
          .'"rows": ['
          .ConnectArry($arryRow)
          .']
         }';
  return $ret;
}

function ConnectArry($arry)
{
  $ret = '';
  for ($i=0; $i < count($arry); $i++)
  {
    $ret = ($i != (count($arry)-1)) ? $ret.$arry[$i].',' : $ret.$arry[$i] ;
  }
  return $ret;
}

?>