<?php
namespace Bin\Spider\Online;

use Bin\lib\selector;
use Bin\Spider\DataColumn;

/**
 * Class Jd
 * @package Bin\Spider\Online
 */
class Jd extends DataColumn
{

	public static function findXpath($html)
	{
		return Jd::Select($html,[
				[
						'name'=>'title',
						'selector'=>"//div[@class='sku-name']/text()"
				]
		]);
	}
}