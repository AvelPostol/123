
<?



$_SERVER["DOCUMENT_ROOT"] = "/home/bitrix/www";
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php"); //подключаем пролог

use Bitrix\Main\Loader;
use Bitrix\Main\Type;
//          'select' => ['ID', 'NAME', 'SURNAME','PATRONYMIC'],
//          'select' => ['ID', 'DATETIME', 'CLASSROOM','LESSON', 'ID_TEACH'], 

$arrname = array("Имя1", "Имя2", "Имя3", "Имя4", "Имя5");
$arrsurname = array("фамилия1", "фамилия2", "фамилия3", "фамилия4", "фамилия5");
$arrpatronymic = array("отчество1","отчество2","отчество3","отчество4","отчество5");
$arrpatronymic = array("отчество1","отчество2","отчество3","отчество4","отчество5");


$arrlesson = array("предмет1", "предмет2", "предмет3");
$numiter = array();

$connection = \Bitrix\Main\Application::getConnection();

$connection->truncateTable('modstud_stu');
$connection->truncateTable('modstud_tea');
$connection->truncateTable('modstud_timetable');
$connection->truncateTable('modstud_categ');

if(CModule::IncludeModule('modstud.s')){


  $numiter[] = mt_rand(3,7);
  $numiter[] = mt_rand(3,7);
  $numiter[] = mt_rand(3,7);

  //заполнение таблицы студентов
    shuffle($numiter);
    $toiternum = $numiter[0];
    $lastIdst = $toiternum;
    while ($i <= $toiternum){
      $i++;
      shuffle($arrname);
      shuffle($arrsurname);
      shuffle($arrpatronymic);
      $STTable = \Modstud\S\StudTable::add([ 
        'NAME' => $arrname[0],
        'SURNAME' => $arrsurname[0],
        'PATRONYMIC' => $arrpatronymic[0],
    ]);
    }
    
   //заполнение таблицы преподавателей
    shuffle($numiter);
    $toiternum = $numiter[0];
    $lastIdteach = $toiternum;
    $i = 1;
    while ($i <= $toiternum){
      $i++;
    shuffle($arrname);
    shuffle($arrsurname);
    shuffle($arrpatronymic);

    $TEACHTable = \Modstud\S\TeachTable::add([
      'NAME' => $arrname[0],
      'SURNAME' => $arrsurname[0],
      'PATRONYMIC' => $arrpatronymic[0],
    ]);

    }
    

    //заполнение таблицы рассписания
    shuffle($numiter);
    $toiternum = $numiter[0];
    $i = 1;


    while ($i <= $toiternum){
      $i++;

      $start = strtotime("10 September 2021");
      $end = strtotime("15 September 2021");
      $arrtime = ["08:00", "10:00", "12:00", "14:00", "16:00"];
      shuffle($arrtime);
      $totime = $arrtime[0];
      $timestamp = mt_rand($start, $end);
      $randomDate =  date("d.m.Y", $timestamp);
      $fintime = $randomDate . ' ' . $totime;
      $fintime = strtotime($fintime);
      $fintime = date("d.m.Y H:i:s" , $fintime);

      $classroom = mt_rand(101,220);

      shuffle($arrlesson);
      $lesson = $arrlesson[0];

      $tidesc = $lastIdteach;
      $tiasc = 1;

      //MakeTimeStamp("07.04.2005 11:32:00", "DD.MM.YYYY HH:MI:SS");
      

      $idteachrand = mt_rand($tiasc, $tidesc);
      $TEACHTable = \Modstud\S\TimeTable::add([
        'DATETIME' => new Type\DateTime($fintime, 'd.m.Y H:i:s'),
        'ClASSROOM' => $classroom,
        'LESSON' => $lesson,
        'ID_TEACH' => $idteachrand,
      ]);
    }
    $MaxIdCategoryTable = $toiternum;
  

    $TimeTable = \Modstud\S\TimeTable::getList([
      'select' => ['ID'],
    ]);

    foreach ($TimeTable as $id)
            {
                $valid = $id['ID'];  
                $idSt = mt_rand($tiasc, $lastIdst);

                $TEACHTable = \Modstud\S\CategoryTable::add([
                  'TABLE_ST_ID' => $valid,
                  'ID_STUD' => $idSt,
                ]);
            }
              

            }