  'Bin\\' => array($vendorDir . '/php-spider/bin')
  
  composer ps-4引入
  
  
  
      $html=requests::get('https://hibihibi.com/');
      echo selector::select($html,'/html/head/title/text()');
