<?php
namespace Bin\Spider\Online;

use Bin\lib\selector;
use Bin\Spider\DataColumn;

/**
 * Class Vip
 * @package Bin\Spider\Online
 */
class Vip extends DataColumn
{

	public static function findXpath($html)
	{
		return Vip::Select($html,[
				[
						'name'=>'title',
						'selector'=>"//p[contains(@class,'pib-title-detail')]/text()"
				]
		]);
	}

}