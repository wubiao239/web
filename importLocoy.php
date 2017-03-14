<?php
/**
 * #从火车头的access数据库导入到db中。v2.2013.1.8
 *
 * Release Notes
 * =============
 * -感谢晓东贡献修正非英语语种乱码问题到方法：找到php.ini。看看是否有extension=php_com_dotnet.dll，如果没有则添加，如果被注释，则取消注释，然后重启apche
 * -感谢晓东改进：文章乱序功能。即使采集的时候词是挨着的，导入到db到时候顺序也被打乱。
 * -从V2开始，Kiss全面兼容WP，增加了postname字段,新版db请用新版Kiss解析，不要弄错版本。
 * -当$dbname存在时，采用追加方式。如果不存在则创建。
 * -增加非空格区分(如中文)语种tag生成方法。注意44行左右，默认是按中文方式获取的，做俄语/英语等其他语言的时候注意用getTags()方法
 * */
date_default_timezone_set("Asia/Shanghai");
$file="SpiderResult.mdb";
$num=40000;//各个数据库用到的数据个数
for($m=$num;$m<=1*$num;$m=$m+$num){
$db2=$m/$num;
$dbname=$db2."db";
//$dbname="123db";
$fromTime=strtotime("2011/3/20 00:00:00");
$toTime=strtotime("2017/05/20 23:59:59");
//配置使用哪些，这样，可以把一个数据库，生成多个DB
$idstart=$m-$num;
$where="and Id> ".$idstart." and Id<=".$m;
//$where="and Id> 20000 and Id<=41000";
// $con = odbc_connect("Driver={Microsoft Access Driver (*.mdb)};Dbq={$file}", "", "") or die("can not connect");
// $data = odbc_exec($con, "select count(Id) as count from Content where 内容 is not null");
@header("Content-Type: text/html; charset=UTF-8");
set_time_limit(0);
ini_set('memory_limit', '1024M');
$db=getDB();

// $con = odbc_connect("Driver={Microsoft Access Driver (*.mdb)};Dbq={$file}", "", "") or die("can not connect");
// $data = odbc_exec($con, "select count(Id) as count from Content where 内容 is not null");

$dbc = new COM("ADODB.Connection",NULL,65001) or die("ADO connect failed!");
//$dbc->open("Driver={Microsoft Access Driver (*.mdb)};Dbq={$file}"); 
$dbc->open("DRIVER=Microsoft Access Driver (*.mdb);DBQ=". realpath("SpiderResult.mdb"));// 连不上的可把access数据库文件放在import同一目录下,注释上一句使用此句
//$dbc->open($connstr);
$data=$dbc->execute("select count(Id) as count from Content where 内容 is not null {$where}");
$count= intval($data->fields[0]->value);
if($count==0||$toTime-$fromTime==0)die("没有找到文章.活着发布开始时间和结束时间相同.");
$step=intval(($toTime-$fromTime)/$count);
echo "一共发现<b>{$count}</b>篇文章.根据设定,从<b>".date("Y/m/d H:i:s",$fromTime)."</b>-<b>".date("Y/m/d H:i:s",$toTime)."</b>发布完,每个{$step}秒发布一篇.<br>开始转换成DB格式";
flush();
$data->close();
$data=$dbc->execute("select id,标题 as title,内容 as content from Content where 内容 is not null and 标题 is not null {$where} ORDER BY Rnd(id)");
$db->exec("begin exclusive transaction");
$i=0;
while (!$data->eof)
{
	try{
		//TODO 在这里处理得到的每一篇文章.如翻译等.
		//这里只是一个测试。具体生成tag到算法需要按语种选择，没有tag是生成不了相关文章的
		$title=trim($data->fields["title"]->value);
		$content=trim($data->fields["content"]->value);
		$id=$data->fields["id"]->value;
		$description=trim(str_ireplace(array("~" ,"!" ,"@" ,"#" ,"$" ,"%" ,"^" ,"+","&" ,"*" ,"," ,"." ,"?" ,";",":" ,'\'','"' ,"[" ,"]" ,"{" ,"}" ,"!" ,"￥" ,"……" ,"…" ,"、" ,"，","。" ,"？" ,"；" ,"：","'","“" ,"”" ,"'" ,"【" ,"】" ,"～" ,"！" ,"＠" , "＃" ,"＄" ,"％" ,"＾" ,"＆" ,"＊" ,"，" ,"．" ,"＜" ,"＞" ,"；" ,"：","＇","＂" ,"［" ,"］" ,"｛" ,"｝" ,"／" ,"＼" ,"（" ,"）" ,"(" ,")","《","》", '$','¿','×',"[#]")," ",substr(strip_tags($content),0,126)));
		if(empty($title)||empty($content))
		{
			$data->movenext();
			continue;
		}
		//$content = title_do($title,$content,"[#]");
		$s=explode("[#]",$content);
		$content="";
		$imgids="";
		shuffle($s); 
		for($j=0;$j<count($s);$j++){
			$s[$j]=str_replace(array("h2>","span>"),array("h3>","p>"),$s[$j]);
			$imgids.=",".rand(1,272);
			// if(empty($s[$j])||strlen($s[$j])<150){
			// 	unset($s[$j]);

			// }
		}
		$imgids=substr($imgids, 1);
		$content=implode("[#]",$s);

		if(empty($title)||empty($content))
		{
			$data->movenext();
			continue;
		}
		
		
		$tag=getTags($title.strip_tags($description));
		$title=$db->escapeString(trim($title));
		
	
		
		$content=$db->escapeString($content);
		$tag=$db->escapeString($tag);
		$postname=$db->escapeString(clearPoint($title));
		//$postname=$db->escapeString(clearPoint($i));
		
		$sql="insert into post values ('{$title}','{$tag}','{$description}','{$content}','{$imgids}','{$title}',".($fromTime+($i++)*$step+mt_rand(0,$step)).",'{$postname}')";
		@$db->exec($sql);
		
		if($i%500==0)
		{
			$db->exec("end transaction");
			
			$db->exec("begin exclusive transaction");
			echo date("Y/m/d H:i:s")."&nbsp;&nbsp;".$i."&nbsp;:成功转换:{$title}<br>\n";
			ob_flush();flush();
		}
		$data->movenext();
	}
	catch(Exception $e)
	{
		echo $e;
	}
}
echo "{$i}&nbsp;转换完成<br>";
$db->exec("end transaction");
echo "更新tags<br/>";
updateTags();
echo "完成更新tags<br/>";
$db->close();
$data->close();
}

/**按空格区分的语种，比如英文/俄语等
 * @param unknown_type $title
* @return string
*/

function getTags($title)
{
	$tag="";
	$tags=explode(" ",$title);
	foreach($tags as $t)
	{
		$t=trim($t);
		if(3<strlen($t))
			$tag.=",".$t;
	}
	if($tag)$tag=substr($tag,1);
	return $tag;
}

function title_do($title,$content,$fengefu)
{
	$s=explode($fengefu,$content);
	$bh = array();
	$mbh = array();
	for($x=0;$x<count($s);$x++)
	{
		if(-1<strpos(str_ireplace(array("  "," "),"",strtolower($s[$x])),str_ireplace(array("  "," "),"",strtolower($title))))
		{
			$bh[]=$s[$x];
		}
		else
		{
			$mbh[]=$s[$x];
		}
	}

	if(count($bh)!=0)
	{
		$tmp = rand(2,3);//留下2-3条与标题重复的信息
		if($tmp<count($bh))
		{
			@$rand_bh=array_rand($bh,$tmp);
	
			foreach($rand_bh as $e)
			{
				$t[] = $bh[$e];
			}
			
			@$arrmer=array_merge($t,$mbh);

			shuffle($arrmer);
			$content = implode($fengefu,$arrmer);
		}
	}
	
	return $content;
}

		
//创建一个空的DB
function getDB()
{
	global $dbname;
	if(file_exists($dbname))echo "<h2>{$dbname}存在，做追加操作。</h2>";
	$db=new SQLite3($dbname,SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE);
	$db->exec("CREATE TABLE IF NOT EXISTS post (title varchar(256),tag varchar(256),description varchar(512),content TEXT, imgids varchar(512),comment TEXT,posttime INTEGER,postname varchar(512))") && $db->exec("CREATE TABLE if not exists tag (k VARCHAR(128) PRIMARY KEY,v TEXT,count integer)") && $db->exec("create index if not exists indexcount on tag (count desc) ") && $db->exec("create index if not exists indextime on post (posttime desc)") && $db->exec("create UNIQUE index if not exists indexpostname on post (postname)");
	return $db;
}
function getData($sql){
	global $db;
	$result=$db->query($sql) or die("Error:".$sql);
	$ret=array();
	while($row=$result->fetchArray(SQLITE3_ASSOC))$ret[]=$row;
	unset($result);
	unset($row);
	return $ret;
}

function checkTables()
{
	global $db;
	return $db->exec("CREATE TABLE IF NOT EXISTS post (title varchar(256),tag varchar(256),description varchar(512),content TEXT,imgids varchar(512),comment TEXT,posttime INTEGER)") && $db->exec("CREATE TABLE if not exists tag (k VARCHAR(128) PRIMARY KEY,v TEXT,count integer)") && $db->exec("create index if not exists indexcount on tag (count desc) ") && $db->exec("create index if not exists indextime on post (posttime desc)");
}

function updateTags()
{
	$tags=array();
	$sql="select rowid,tag from post";
	$data=getData($sql);
	foreach($data as $d)
	{
		$postTags=explode(",",$d["tag"]);
		foreach($postTags as $pt)
		{
			if(isset($tags[$pt]))$tags[$pt]=$tags[$pt].",".$d["rowid"];
			else $tags[$pt]=$d["rowid"];
		}
	}
	if(!empty($tags))
	{
		global $db;
		$db->exec("drop table tag");
		checkTables();
		$db->exec("begin exclusive transaction");
		foreach($tags as $k=>$v)
		{
			$sql="insert into tag(k,v,count) values ('".$db->escapeString($k)."','{$v}',".(substr_count($v,",")+1).")";
			$db->exec($sql);
		}
		$db->exec("end transaction");
	}
	echo count($tags)." tags updated";
}

function clearPoint($kw)
{ 
    $kw= str_replace(array("~" ,"!" ,"@" ,"#" ,"$" ,"%" ,"^" ,"+","&" ,"*" ,"," ,"." ,"?" ,";",":" ,'\'','"' ,"[" ,"]" ,"{" ,"}" ,"!" ,"￥" ,"……" ,"…" ,"、" ,"，" ,"。" ,"？" ,"；" ,"：","'","“" ,"”" ,"'" ,"【" ,"】" ,"～" ,"！" ,"＠" ,"＃" ,"＄" ,"％" ,"＾" ,"＆" ,"＊" ,"，" ,"．" ,"＜" ,"＞" ,"；" ,"：","＇","＂" ,"［" ,"］" ,"｛" ,"｝","／" ,"＼" ,"（" ,"）" ,"(" ,")","《","》", '$','¿','×'),'', $kw ); 
		
    $kw= str_replace( array("  ","-","_","\\","/"),' ', $kw ); 
	
    $kw= str_replace(array("á","í","é","ó","ú","ñ","Á","Í","É","Ó","Ú","Ñ","ç","ã","à","â","ê","ô","õ","ü"),array("a","i","e","o","u","n","a","i","e","o","u","n","c","a","a","a","e","o","o","u"),$kw);
	
    $kw= str_replace(array("а","б","в","г","д","е","ё","ж","з","и","й","к","л","м","н","о","п","р","с","т","у","ф","х","ц","ч","ш","я","ю","щ","щ","э","ъ","ь","А","Б","В","Г","Д","Е","Ё","Э","Ж","З","И","Й","К","Л","М","Н","О","П","Р","С","Т","У","Ф","Х","Ц","Ч","Ш","Щ","Ы","Ю","Я","ы"),array("a","b","v","g","d","e","e","zh","z","i","j","k","l","m","n","o","p","r","s","t","u","f","x","c","ch","s","ya","yu","sch","y","e","","","A","B","V","G","D","E","E","E","J","Z","I","I","K","L","M","N","O","P","R","S","T","U","F","H","C","CH","SH","SH","Y","YU","YA","s"),$kw);
    
	$kw = strtolower(strip_tags(trim($kw)));    
	
	$kw = explode(' ',$kw);
	
	$kw = implode('-',array_filter($kw));
	
	return $kw;
} 
?>