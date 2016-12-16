<?php
namespace Spider\Tests;
/**
 * Created by PhpStorm.
 * User: sks
 * Date: 2016/12/5
 * Time: 10:30
 */

use Bin\lib\requests;
use Bin\Spider;

include './../config.php';
ini_set("memory_limit", "1024M");

header("Content-type:text/html;charset=utf-8");
requests::$headers=[
    'User-Agent'=>'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'
];
//天猫cookie
requests::set_cookies(
    '_tb_token_=mbFeNT6dvjtq; cookie2=f8545b8dfece6d7ad02fbfc6fb1925e7; t=2e6708c6f889f16505eff94df8cf9618; v=0; thw=cn; miid=370835882751024233; tk_trace=oTRxOWSBNwn9dPyscxqAz9fIO73QQFhF7kVkgTL59JVC7kpGpQEdOb67caDmPjbIYxYMRNL7NNtJ3pM%2Be2NcPhx%2BT4v9etEvsu%2BorRlK93xHrWRwpNW7o%2FpOknyoUMfxpynvWG23xYyKSVRFF1PtYvDTq8qkkAsPi91ewCtvCBQSkqTq4Frht20DvU08FrrpqL31mV8q8EooHqQUfiPvt9QjhchwdLyzn3%2B4OzwUhBMXZDZBQRCd65gK96unDIao5JPJ807FPMMm9meztW4RWXazoLST4xyLMrxiiy7Vt3v3V1jOb%2B2bl8%2BIXuUD6czB5X5F4VIQ2%2FlwBA2wvhFz5wKc62sD4XIT5f8%3D; cna=iZ/WECV7cjMCASRuDfLrdNcI; mt=ci%3D-1_0; l=Al5e585CyXuMTF//35Yiw5O9Lv6gHyKZ; isg=AjEx7L8_zZLgZGGG2kA5uW9DQL0qI6WQlgCuZRNGLfgXOlGMW261YN9aKnmm'
);
$START=time();
$Spider = new Spider([
    //百度
    'https://www.baidu.com',

    //京东
    'http://item.jd.com/1482643121.html',
    //天猫
    'https://detail.tmall.com/item.htm?spm=a220m.1000858.1000725.1.AzOfDV&id=536980811158&skuId=3413584971627&areaId=110100&user_id=2874825850&cat_id=50025174&is_b=1&rn=31e620c8cd52945d5136d6a62ef2e9f2',
    //当当
    'http://product.dangdang.com/1354578239.html',
    //蘑菇街
    'http://shop.mogujie.com/detail/1k2txzk?acm=3.ms.1_4_1k2txzk.0.1651-22922.trV9cq5r9P1B3.t_0&ptp=1.r1HKyb._b_be090c7c4d9d53b6_wall_docs.1.j56AE&f=baidusem_4uv5iimn1v',
    'https://detail.tmall.com/item.htm?spm=a220o.1000855.w4004-15282342785.2.zKxJDr&abtest=_AB-LR129-PR129&pvid=22283985-e456-4550-b98e-61b7c92b1602&pos=1&abbucket=_AB-M129_B16&acm=03130.1003.1.701602&id=535973259004&scm=1007.12929.25829.100200300000000',
    //唯品会
    'http://www.vip.com/detail-977966-145500306.html',
]);

//		$Spider = new Spider(
//				[
//						'https://detail.tmall.com/item.htm?spm=a220m.1000858.1000725.1.AzOfDV&id=536980811158&skuId=3413584971627&areaId=110100&user_id=2874825850&cat_id=50025174&is_b=1&rn=31e620c8cd52945d5136d6a62ef2e9f2'
//				]);
$r =  $Spider->Run();
$tnd=time()-$START;
$r['time']=$tnd;
return $r;