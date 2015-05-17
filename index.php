<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Dragonite</title>
</head>

<body>






<?php


//API控制台申请得到的ak（此处ak值仅供验证参考使用）
$ak = '2d7e1a475468cd13ef37c6f4a8462cff';
 
//应用类型为for server, 请求校验方式为sn校验方式时，系统会自动生成sk，可以在应用配置-设置中选择Security Key显示进行查看（此处sk值仅供验证参考使用）
$sk = 'E5f90174225471f245267b5741073703';
 

/*
//以Geocoding服务为例，地理编码的请求url，参数待填
$url = "http://api.map.baidu.com/geocoder/v2/?address=%s&output=%s&ak=%s&sn=%s";

//get请求uri前缀
$uri = '/geocoder/v2/';
 
//地理编码的请求中address参数
$address = '百度大厦';
 
//地理编码的请求output参数
$output = 'json';
 
//构造请求串数组
$querystring_arrays = array (
	'address' => $address,
	'output' => $output,
	'ak' => $ak
);
 
//调用sn计算函数，默认get请求
$sn = caculateAKSN($ak, $sk, $uri, $querystring_arrays);
 
//请求参数中有中文、特殊字符等需要进行urlencode，确保请求串与sn对应
$target = sprintf($url, urlencode($address), $output, $ak, $sn);
 
//输出计算得到的sn
echo "sn: $sn \n";
 
//输出完整请求的url（仅供参考验证，故不能正常访问服务）
echo "url: $target \n";

function caculateAKSN($ak, $sk, $url, $querystring_arrays, $method = 'GET')
{  
    if ($method === 'POST'){  
        ksort($querystring_arrays);  
    }  
    $querystring = http_build_query($querystring_arrays);
	echo $querystring . "<br>";
    return md5(urlencode($url.'?'.$querystring.$sk));  
}

*/



$url = "http://api.map.baidu.com/location/ip?ak=%s&sn=%s";

//get请求uri前缀
$uri = '/location/ip';

$querystring = "ak=".$ak;

//调用sn计算函数，默认get请求
$sn = caculateAKSN($ak, $sk, $uri, $querystring);

$target = sprintf($url, $ak, $sn);

//输出计算得到的sn
// 9e7fc96d9e06c667687455085e275ab2
echo "sn: $sn \n";
 
//输出完整请求的url（仅供参考验证，故不能正常访问服务）
echo "url: $target \n";


function caculateAKSN($ak, $sk, $url, $querystring, $method = 'GET')
{  
    // %2Flocation%2Fip%3Fak%3D2d7e1a475468cd13ef37c6f4a8462cffE5f90174225471f245267b5741073703
    echo "before encode: " + $url.'?'.$querystring.$sk + ";
    $str = urlencode($url.'?'.$querystring.$sk);
    return md5($str);  
}


?>



  www.dgni.net<br>
  <?php phpinfo(); ?>
</body>
</html>
