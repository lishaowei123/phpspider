<?php
namespace Bin\Spider;

use Bin\lib\selector;
use Bin\lib\requests;
/**
 * Created by PhpStorm.
 * User: lishaowei
 * Date: 2016/12/15
 * Time: 10:10
 */

class DataColumn
{
	/**
	 * 配置信息
	 * @var array
	 */
	public $table=[];
	/**
	 * 爬虫扩展信息
	 * @var array
	 */
	public static $className = [];
	public function __construct()
	{
		if(!empty($this->table))
		{
			foreach((array)$this->table as $key=>$value)
			{
				$this->setUrlArray($key,$value);
			}
		}
		return true;
	}

	/**
	 * 当前爬虫host
	 * @var null
	 */
	public static $host = null;
	/**
	 * 当前爬虫url
	 * @var null
	 */
	public static $url  = null;
	/**
	 * 扩展配置
	 * @var array
	 */
	public static $urlArray = [];

	public static $urls = [];
	/**
	 * 获取对应html信息
	 * @var array
	 */
	public static $html =[];
	/**
	 * 返回信息
	 * @var array
	 */
	public static $response =[];

	/**
	 * 查询多个方法
	 * @author  lishaowei  </99>
	 * @access  public
	 * @param $html
	 * @since   1.0
	 */
	public static function findXpath($html){}
	/**
	 * 执行多个选择器
	 * @author  lishaowei  </99>
	 * @access  public
	 * @param $html
	 * @param $array
	 * @since   1.0
	 * @return  array
	 */
	public static function Select($html,$array)
	{
		$return = [];
		foreach($array as $select)
		{
			if(!empty($select['type']) && $select['type']=='function')
			{
				$return[$select['name']] = $select['selector'];
			}else{
				$return[$select['name']] = selector::select($html,$select['selector']);
			}

		}
		return $return;
	}
	/**
	 * 网站自动识别
	 * @author  lishaowei  </99>
	 * @access  public
	 * @param $url
	 * @since   1.0
	 * @return  mixed
	 */
	public static function Run($url)
	{
		switch($url)
		{
			/**
			 * 多线程
			 */
			case is_array($url):
				foreach($url as $key=>$u) {
					self::$className[$key] = self::file_url_function($u);
					if(empty(self::$className[$key])){
						self::$response[$key] = self::responseData('',$u,'','500'); //添加不能爬取url500到返回信息
						unset(self::$className[$key]);  //如果没有扩展爬虫删除加快速度
						unset($url[$key]);              //删除没有爬虫url
					}
				}
				self::$html = requests::gets($url);
				return self::call_func(self::$className,self::$html);
				break;

			/**
			 * 单线程
			 */
			case is_string($url):

				self::$className = self::file_url_function($url);
				self::$html = requests::get($url);
				self::$url = $url;
				return   self::call_func(self::$className,self::$html) ;
				break;
			default:
				return false;
				break;
		}
	}

	/**
	 * 自动识别调用类
	 * @author  lishaowei  </99>
	 * @access  public call_func
	 * @param 	string|array $className  爬虫名字
	 * @param 	string|array $html  爬虫内容
	 * @since   1.0
	 * @return  mixed
	 */
	public static function call_func($className,$html)
	{


		switch ($className) {
			case is_array ($className):
				foreach ( $html as $key => $value ) {
					self::$url = $value[ 'url' ];//设置当前爬行url
					self::$response[ $key ] = self::responseData (
							call_user_func (array (__NAMESPACE__ . "\\" . $className[ $key ] , "findXpath") , $value[ 'html' ]) ,
							$value[ 'url' ] ,
							$className[ $key ] ,
							$value[ 'code' ]
					);
				}
				break;
			case is_string ($className):
				self::$response = self::responseData (
						call_user_func ([__NAMESPACE__ . "\\" . $className , "findXpath"] , $html) ,
						self::$url ,
						$className ,
						'200'
				);
				break;
			default:
				return false;
				break;
		}
		return self::$response;

	}

	/**
	 * 返回统一格式
	 * @author  lishaowei  </66>
	 * @access  public responseData
	 * @param $dataList
	 * @param $url
	 * @param $className
	 * @param $code
	 * @since   1.0
	 * @return  array
	 */
	public static function responseData( $dataList , $url , $className , $code )
	{

		return [
				'dataList' => $dataList ,
				'url' => $url ,
				'className' => $className ,
				'code' => $code
		];
	}
	/**
	 * 匹配对应爬虫
	 * @author  lishaowei  </99>
	 * @access  public
	 * @param $url
	 * @since   1.0
	 * @return  mixed
	 */
	public static function file_url_function($url)
	{
		$host = @parse_url($url);
		if(empty($host)) return false;
		return empty(self::$urlArray[$host['host']])?FALSE:self::$urlArray[$host['host']];
	}




	/**
	 *
	 * @author  lishaowei  </66>
	 * @access  public setUrlArray
	 * @param string $key
	 * @param string $url
	 * @since   1.0
	 */
	public static function setUrlArray($key,$url)
	{
		self::$urlArray[$key] = $url;
	}
	public static function setUrl($url)
	{
		self::$url = $url;
	}
	public static function getUrl()
	{
		return self::$url;
	}
	public static function setHost($host)
	{
		self::$host = $host;
	}

	public static function getHost()
	{
		return self::$host;
	}


}