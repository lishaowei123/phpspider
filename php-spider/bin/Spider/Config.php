<?php
namespace Bin\Spider;





/**
 * Class Auto 自动识别
 */
class Config extends DataColumn
{

	/**
	 * 注册对应host到爬虫扩展
	 * @var array
	 */
	public $table = [
			'item.jd.com'=>'Online\Jd',
			'www.baidu.com'=>'Online\Baidu',
			'detail.tmall.com'=>'Online\TianMao',
			'product.dangdang.com'=>'Online\DangDang',
			'shop.mogujie.com'=>'Online\MoGu',
			'www.vip.com'=>'Online\Vip',
	];


}

