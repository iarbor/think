<?php
		
/*
@获取用户的ip//如果是加密的话，此方法则不行
*/
		function getip() {    
// $ip = $_server['remote_addr'];     
 //if (!empty($_server['http_client_ip'])) {        
 // $ip = $_server['http_client_ip'];    
 //} elseif (!empty($_server['http_x_forwarded_for'])) {        
 // $ip = $_server['http_x_forwarded_for'];    
 //}  
 $ip=getenv('REMOTE_ADDR');  
  return $ip;
}
function cny($ns){
static $cnums = array("零", "壹", "贰", "叁", "肆", "伍", "陆", "柒", "捌", "玖");
$cnyunits = array("圆", "角", "分");
$grees = array("拾", "佰", "仟", "万", "拾", "佰", "仟", "亿");
list($ns1, $ns2) = explode(".", $ns, 2);
$ns2 = array_filter(array($ns2[1], $ns2[0]));
$ret = array_merge($ns2, array(implode("", _cny_map_unit(str_split($ns1), $grees)), ""));
$ret = implode("", array_reverse(_cny_map_unit($ret, $cnyunits)));
return str_replace(array_keys($cnums), $cnums, $ret);
}

function _cny_map_unit($list, $units){
$ul = count($units);
$xs = array();
foreach (array_reverse($list) as $x) {
$l = count($xs);
if ($x != "0" || !($l % 4)) $n = ($x == '0' ? '' : $x) . ($units[($l - 1) % $ul]);
else $n = is_numeric($xs[0][0]) ? $x : '';
array_unshift($xs, $n);
}
return $xs;
}		
		
		
		
/**
 * 通过IP获取城市
 * @param string $ip ip地址
 * @return string 【城市名称】
 */
function get_ip_city($ip)
{
    $url = 'http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=';
    @$city = file_get_contents($url . $ip);
    $city = str_replace(array('var remote_ip_info = ', '};'), array('', '}'), $city);
    $city = json_decode($city, true);
    if ($city['city']) {
        $location = $city['city'];
    } else {
        $location = $city['province'];
    }
	if($location){
		return $location;
	}else{
		return;
	}
}
/**
 * 生成令牌函数
 * @param int $length 令牌长度
 * @return 
 */	
 function getToken($length=32){
 	$token="";
 	$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
 	$codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
 	$codeAlphabet .= "0123456789";
 	for( $i = 0; $i<$length ; $i++){
 		$token .= $codeAlphabet[crypto_rand_rand_secure(0,strlen($codeAlphabet))];
 	}
 	return $token;
 	
 
 }

/**
 * 生成随机数
 * @param int $min 最小值  $max最大值
 * @return 
 */	
function crypto_rand_rand_secure($min, $max){
	$range = $max - $min;
	if ($range < 0) return $min; // not so random...
	$log = log($range, 2);
	$bytes = (int) ($log / 8) + 1; // length in bytes
	$bits = (int) $log + 1; // length in bits
	$filter = (int) (1 << $bits) - 1; // set all lower bits to 1
	do {
		$rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
		$rnd = $rnd & $filter; // discard irrelevant bits
	} while ($rnd >= $range);
	return $min + $rnd;
}


/**
 * 数据安全处理函数
 * @param string $str 待过滤字符串
 * @return 
 */	
function get_safe_str($str){
	$str=htmlspecialchars_decode($str,ENT_QUOTES);
	$str=str_replace(array('<','>','\'','"','%','/*'),array('《','》','‘','”','',''),$str);
	$str=mysql_escape_string($str);
	return $str;
}

/*
身份证15位转18位
*/

function getIDCard($idCard) {
        // 若是15位，则转换成18位；否则直接返回ID
        if (15 == strlen ( $idCard )) {
            $W = array (7,9,10,5,8,4,2,1,6,3,7,9,10,5,8,4,2,1 );
            $A = array ("1","0","X","9","8","7","6","5","4","3","2" );
            $s = 0;
            $idCard18 = substr ( $idCard, 0, 6 ) . "19" . substr ( $idCard, 6 );
            $idCard18_len = strlen ( $idCard18 );
            for($i = 0; $i < $idCard18_len; $i ++) {
                $s = $s + substr ( $idCard18, $i, 1 ) * $W [$i];
            }
            $idCard18 .= $A [$s % 11];
            return $idCard18;
        } else {
            return $idCard;
        }
    }

/**
 * 判断是不是手机访问
 * @return true 
 */
function isMobile() {
	//在此加入宣传增加vip 时长
	
	
	// 如果有HTTP_X_WAP_PROFILE则一定是移动设备
	if (isset ($_SERVER['HTTP_X_WAP_PROFILE'])) {
		return true;
	}
	//如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
	if (isset ($_SERVER['HTTP_VIA'])) {
		//找不到为flase,否则为true
		return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
	}
	//脑残法，判断手机发送的客户端标志,兼容性有待提高
	if (isset ($_SERVER['HTTP_USER_AGENT'])) {
		$clientkeywords = array ('nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile');
		// 从HTTP_USER_AGENT中查找手机浏览器的关键字
		if (preg_match("/(" . implode('|', $clientkeywords) . ")/i",strtolower($_SERVER['HTTP_USER_AGENT']))) {
			return true;
		}
	}
	 //协议法，因为有可能不准确，放到最后判断
	if (isset ($_SERVER['HTTP_ACCEPT'])) {
	// 如果只支持wml并且不支持html那一定是移动设备
	// 如果支持wml和html但是wml在html之前则是移动设备
		if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
			return true;
		}
	}
	return false;
}



/**
 * 截取字符串
 * @param string $str 待截取字符串
 * @param string $start 开始位置
 * @param string $len 截取长长度
 * @param string $add 末尾是否添加字符 
 * @return string 
 */
function sub_str($str,$start=0,$len,$add=0){
	if($add){
		if(mb_strlen($str,'UTF8')>$len){
			return mb_substr($str,$start,$len,'UTF8').$add;
		}else{
			return mb_substr($str,$start,$len,'UTF8');
		}
	}else{
		return mb_substr($str,$start,$len,'UTF8');
	}
}

//传入文件路径。获取文件大小（字节）
function getsize($file_name)   {
	$s=stat(dirname(dirname(dirname(dirname(dirname((__FILE__)))))).$file_name);
        $size = $s["size"];
        return $size;
    }

//把字节单位转换层其他单位
function size($bytesize){ //当$bytesize 大于是1024字节时，开始循环，当循环到第4次时跳出；
        $i=0;
        while(abs($bytesize)>=1024){        
        $bytesize=$bytesize/1024;
        $i++;
        if($i==4)break;
        }
        //将Bytes,KB,MB,GB,TB定义成一维数组；
        $units= array("B","KB","MB","GB","TB");
        $newsize=round($bytesize,2);
        return $newsize.$units[$i];

}
?>
