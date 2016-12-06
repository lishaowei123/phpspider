  'Bin\\' => array($vendorDir . '/php-spider/bin')
  
  composer ps-4引入
  
    /*
     * @param $html
     * @param $selector 
     * @param string $selector_type 'xpath' ,'css' ,'regex'
     * @since   1.0
     * @return  bool|void
     */
      
      $html=requests::get('https://www.baidu.com/');
      echo selector::select($html,'/html/head/title/text()');

     百度一下,你就知道

  $urls=['https://www.baidu.com/','https://www.baidu.com/']
  requests::set_cookies();
  requests::$headers=[];
$htmls=  requests::gets($urls);//curl并发
var_dump($htmls);

{
  {
  code:200,
  html:html,
  url:url
  },
  ...

}
  ...
