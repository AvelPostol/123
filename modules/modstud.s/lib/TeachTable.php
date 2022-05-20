<?php
namespace Modstud\S;

use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;
 


class TeachTable extends Entity\DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'modstud_tea';
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
			new Entity\StringField('NAME'),
			new Entity\StringField('SURNAME'),
			new Entity\StringField('PATRONYMIC'),
		);
	}
}


