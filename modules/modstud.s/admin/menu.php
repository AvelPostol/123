<?php
defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
$aMenu = array(
    array(
        'parent_menu' => 'global_menu_content',
        'sort' => 400,
        'text' => "т_студенты",
        'title' => "",
        'url' => 'perfmon_table.php?lang=ru&table_name=modstud_stu'
    ),
    array(
        'parent_menu' => 'global_menu_content',
        'sort' => 400,
        'text' => "т_преподаватели",
        'title' => "",
        'url' => 'perfmon_table.php?lang=ru&table_name=modstud_tea'
    ),
    array(
        'parent_menu' => 'global_menu_content',
        'sort' => 400,
        'text' => "т_рассписание",
        'title' => "",
        'url' => 'perfmon_table.php?lang=ru&table_name=modstud_timetable'
    ),
    array(
        'parent_menu' => 'global_menu_content',
        'sort' => 400,
        'text' => "т_группа",
        'title' => "",
        'url' => 'perfmon_table.php?lang=ru&table_name=modstud_categ'
    ),
);
return $aMenu;
