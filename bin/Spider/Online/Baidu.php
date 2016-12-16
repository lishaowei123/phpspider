<?php
namespace Bin\Spider\Online;

use Bin\lib\selector;
use Bin\Spider\DataColumn;

/**
 * Class Baidu
 * @package Bin\Spider\Online
 */
class Baidu extends DataColumn
{


	public static function findXpath($html)
	{
		return selector::select($html,'/html/head/title/text()');

	}

}