<?php
namespace Modstud\S;

use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;
 


class TimeTable extends Entity\DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'modstud_timetable';
	}

	/**
	 * Returns entity map definition.
	 *
	 * @return array
	 */
	public static function getMap()
	{
		return array(
			new Entity\IntegerField('ID', array(
				'primary' => true
			)),
			new Entity\DateField('DATETIME'),    // рандом
			new Entity\StringField('ClASSROOM'), // рандом 101 - 220
			new Entity\StringField('LESSON'),    // рандом из списка
			new Entity\IntegerField('ID_TEACH'), // идентификатор группы(препод.студенты)
		);
	}
}

