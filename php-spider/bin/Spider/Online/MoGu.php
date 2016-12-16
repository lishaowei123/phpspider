<?php
namespace Bin\Spider\Online;

use Bin\lib\selector;
use Bin\Spider\DataColumn;

/**
 * Class MoGu
 * @package Bin\Spider\Online
 */
class MoGu extends DataColumn
{

	public static function findXpath($html)
	{
		return MoGu::Select($html,[
			[
					'name'=>'title',
					'selector'=>"//*[@id='J_GoodsInfo']/div/h1/span/text()"
			]
		]);
	}

}