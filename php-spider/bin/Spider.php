<?php
namespace Bin;
use Bin\Spider\Config;


/**
 * Created by PhpStorm.
 * User: lishaowei
 * Date: 2016/12/15
 * Time: 9:57
 */

class Spider
{

	public static $url=null;

	private static $html=null;
	/**
	 * Spider constructor.
	 * @param $url
	 */
	public function __construct($url)
	{
		self::$url = $url;
	}

	//
	public function Run()
	{
		$autoModel = new Config();
		self::$html = $autoModel->Run(self::$url);//自动识别
		return self::$html;
	}
}