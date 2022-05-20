<? //if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


$_SERVER["DOCUMENT_ROOT"] = "/home/bitrix/www";
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Loader;

$allArr = array();
$STTabletoTable = array();

if(CModule::IncludeModule('modstud.s')){

            $TimeTable = \Modstud\S\TimeTable::getList([
              'select' => ['ID', 'DATETIME', 'ClASSROOM','LESSON', 'ID_TEACH'],
            ]);
            $STTable = \Modstud\S\StudTable::getList([
              'select' => ['ID', 'NAME', 'SURNAME','PATRONYMIC'],
            ]);
            $TEACHTable = \Modstud\S\TeachTable::getList([
              'select' => ['ID', 'NAME', 'SURNAME','PATRONYMIC'],
            ]);
            $CategoryTable = \Modstud\S\CategoryTable::getList([
              'select' => ['ID', 'TABLE_ST_ID', 'ID_STUD'],
            ]);

            $i = 0;

            $toid[] = array();

            foreach ($TimeTable as $row){
              $allArr['ID'][$i] = $row['ID'];
              $allArr['DATETIME'][$i] = $row['DATETIME'];
              $allArr['ClASSROOM'][$i] = $row['ClASSROOM'];
              $allArr['LESSON'][$i] = $row['LESSON'];

              $idteach = $row['ID_TEACH'];

              $TEACHTableitem = \Modstud\S\TeachTable::getList([
                'select' => ['ID', 'NAME', 'SURNAME','PATRONYMIC'],
                'filter' => ['ID' => $idteach],
              ]);

              foreach ($TEACHTableitem as $row1){

                $allArr['ID_TEACH_ALLINFO'][$i] = $row1['NAME'] . ' ' . $row1['SURNAME'] . ' ' . $row1['PATRONYMIC'];

               }

              $toid[] = $row['ID'];

              $i++;
            }

            $row211['TABLE_ST_ID'] = array();
            $row211['ID_STUD'] = array();
             
              while ($row21 = $CategoryTable->fetch()){

                $row211['ID'][] = $row21['ID'];
                $row211['TABLE_ST_ID'][] = $row21['TABLE_ST_ID'];
                $row211['ID_STUD'][] = $row21['ID_STUD'];
                
                }

                foreach ($STTable as $STableitemRow){
            
                  $arrst['ID'][] = $STableitemRow['ID'];
                  $arrst['FIO'][] = $STableitemRow['NAME'] . ' ' . $STableitemRow['SURNAME'] . ' ' . $STableitemRow['PATRONYMIC'];
              
                }

            foreach ($toid as $rowi){ 
              
              $schetc = 0;
              foreach ($row211['TABLE_ST_ID'] as $rowi1){

                if($rowi1 == $rowi){

                  $idstmain = $row211['ID_STUD'][$schetc];
                  
                  $nt = 0;
                  foreach ($arrst['ID'] as $rowi12){
                    if($idstmain == $rowi12){
                      $allArr['ID_ST_ALLINFO'][$rowi][] = $arrst['FIO'][$nt];
                    }
                    $nt++;
                  }

                }

                $schetc++;
              }
            }



            $arResult = $allArr;
          }


        $this->IncludeComponentTemplate();

      

?>