<?php
namespace Bin\Spider\Online;

use Bin\lib\selector;
use Bin\Spider\DataColumn;

/**
 * Class DangDang
 * @package Bin\Spider\Online
 */
class DangDang extends DataColumn
{

	public static function findXpath($html)
	{

		return DangDang::Select($html,[
				[
						'name'=>'title',
						'selector'=>self::title($html),
						'type'=>'function'
				]
		]);
	}

	public static function title($html)
	{
		return iconv("GB2312","UTF-8//IGNORE",utf8_decode(selector::select($html,"//h1/@title")));
	}

}