<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новая страница");
$APPLICATION->IncludeComponent(
  "timetable:timetable.tt",
  ".default",
  Array(
  ),
  false
  );



?>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>