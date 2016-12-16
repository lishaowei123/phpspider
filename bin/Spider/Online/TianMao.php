<?php
namespace Bin\Spider\Online;

use Bin\lib\requests;
use Bin\lib\selector;
use Bin\Spider\DataColumn;

/**
 * Class TianMao
 * @package Bin\Spider\Online
 */
class TianMao extends DataColumn
{

	public static function findXpath($html)
	{
		return TianMao::Select($html, [
						[
								'name'=>'title',
								'selector'=>"//*[@id='J_DetailMeta']/div[1]/div[1]/div/div[1]/h1/text()"
						],
						[
								'name'=>'img',
								'selector'=>"//img[@id='J_ImgBooth']/@src",
						],
						[
								'name'=>'销量',
								'selector'=>"//span[contains(@class,'tm-count')]/text()",
						],
						[
								'name'=>'收藏量',
								'selector'=>self::action(),
								'type'=>'function'
						]
				]
		);
	}

	/**
	 * 收藏
	 * @author  lishaowei  </99>
	 * @access  public
	 * @since   1.0
	 */
	public static function action()
	{

		$id = 'ICCP_1_'.strtr(selector::select(self::$url,'#&id=\w+&#is','regex'),['&id='=>'','&'=>'']);
		$url= 'https://count.taobao.com/counter3';
		$response = requests::get($url,[
				'_ksTS'=>'1481791664493_230',
				'callback'=>'jsonp231',
			    'keys'=>'SM_368_dsr-2874825850,'.$id
		]);
		$return = selector::select($response,'#:\w+,#isU','regex');
		if(empty($return)) return ''; else return strtr($return[0],[':'=>'',','=>'']);
	}
}