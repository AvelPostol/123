<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$_SERVER["DOCUMENT_ROOT"] = "/home/bitrix/www";
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
use Bitrix\Main\Loader;

?>


<table border="1" id="table-todo" >

   <tr> <td>Дата</td><td>Кабинет</td><td>Предмет</td><td>Руководитель</td><td>Студент</td> </tr>

   <?
   foreach ($arResult['ID_ST_ALLINFO'] as $row){
      $ar4col[] = $row;
   }

     $i = 0;
   foreach ($arResult['DATETIME'] as $row){
    
?>
   <tr>
      
   <td><? echo $arResult['DATETIME'][$i] ?></td> 
   <td><? echo $arResult['ClASSROOM'][$i] ?></td> 
   <td><? echo $arResult['LESSON'][$i] ?></td>
   <td><? echo $arResult['ID_TEACH_ALLINFO'][$i] ?>
   <?php
      $g = 0;
      foreach ($arResulte['ID_TEACH_ALLINFO'][$i] as $row){
      echo  $row[$g];
         $g++;
      }
      ?>
   </td>

   <td>
   <?php 
   $g = 0;
      foreach ($ar4col[$i] as $row){
         echo $row;
         $g++;
      }
   ?>
   </td>

<?
  $i++;
}

?>
  </tr>
  <tr>
<button id="delinst" > пересобрать данные и обновить страницу </button>
</tr>

</table>

<link href="/local/components/timetable/timetable.tt/css.css" type="text/css"  rel="stylesheet" >
<script type="text/javascript" src="/local/components/timetable/timetable.tt/table-todo.js"></script>
<?php

?>