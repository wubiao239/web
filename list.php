<?php
/**

/rowid_postname/

*/

error_reporting(0);
require_once ("Kiss.php");
//引用功能文件
if (isset($_GET["sitemap"]) && isset($_GET["page"])) {
    $kiss = new Kiss("1db", "/");
    $kiss -> sitemap(isset($_GET["page"]) ? intval($_GET["page"]) : 0);
    exit(0);
}

if (isset($_GET['id'])) {
    //内容页面

    $kiss = new Kiss("1db", "");
    $post = $kiss -> getPost($_GET['id']);
    $postname=$post['postname'];
    $id = $post['rowid'];

    if (empty($post)||$postname!=$_GET['postname']) {
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
        echo "<h1>404 File Not Found</h1>";
        exit ;
    }

    $ac = explode("[#]", $post["content"]);
    $aimgids = explode(",", $post["imgids"]);
    $j = 0;
   

    foreach ($ac as $key => $value) {
        # code...
        $value = str_replace(array("h2>", "span>"), array("h3>", "p>"), $value);
        $imgid = $aimgids[$j];
         preg_match_all("~<p>(.*?)</p>~",$value , $mp);
          $value=preg_replace("~,(.*?)</h3>~i","</h3>",$value);
          if(!empty($mp[1][0])){
        $htmlcontent .= "
          <div class=\"four columns portfolio-item mb20\">
                                             <img src=\"/img/m".$imgid.".jpg\"> 
                                              <div class=\"portfolio-context\">
                                               
                                               
                                {$value}
                               <a href='#' onclick='openZoosUrl()' rel='nofollow'><img src='/images/contact_us.jpg' alt='contact'></a>
                       </div></div>

       


          ";
        $j++;
    }

    }
    

    $posts = $kiss -> getPostsByNeighbor($id);


    $htmlcontent .= "<div class='clearfix'></div>";
    $htmlcontent .= "<div class='article-nav'>";
    if (!empty($posts["pre"]))
        $htmlcontent .= "prev:<a href='/{$posts["pre"]["rowid"]}_{$posts["pre"]["postname"]}/'>{$posts["pre"]["title"]}</a><br>";
    if (!empty($posts["next"]))
        $htmlcontent .= "next:<a href='/{$posts["next"]["rowid"]}_{$posts["next"]["postname"]}/'>{$posts["next"]["title"]}</a><br>";
    $htmlcontent .= "</div>";
} else {
    header('HTTP/1.1 404 Not Found');
    header('Status: 404 Not Found');
    echo "<h1>404 File Not Found</h1>";
    exit ;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Basic Page Needs
  ================================================== -->
<meta charset="UTF-8">
<meta name="description" content="<?=$post["title"]?>">
<title><?=$post["title"]?></title>
<link rel="stylesheet" href="/style.css" type="text/css">
<meta name="viewport" content="width=device-width, user-scalable=no">
</head>
<body>
<div class="body-outer-wrapper">
  <div class="body-wrapper boxed-style">
    <div class="top-navigation-wrapper boxed-style">top</div>
    <div class="header-wrapper container main"> 
      <!-- Get Logo -->
      <div class="logo">
        <h1><a href="/"><?=$post["title"]?></a></h1>
      </div>
      <div class="logo-right-text">
        <div class="logo-right-text-content"> <img src="/images/email.png" alt="when you have any question,you can send us a email"/> <span>info@zenithcrusher.com</span> <span>|</span> <img src="/images/phone.png" alt="you can call us,when you want to contact us"/> <span>+86-21-58386189,58386176</span> </div>
        
      </div>
      <!-- Navigation -->
      <div class="clear"></div>
      <div class="gdl-navigation-wrapper">
        <div class="navigation-wrapper  clearfix">
          <div id="main-superfish-wrapper" class="menu-wrapper">
            <ul class="sf-menu">
              <li class="current-menu-ancestor"> <a href="/index.html">Home</a> </li>
              <li> <a href="/products/">Products</a>
                <ul>
                  <li><a href="/products/crushing/">Crushing equipments</a></li>
                  <li><a href="/products/grinding/">Grinding equipments</a></li>
                  <li><a href="/products/feeding-convering/">Feeding& Conveying</a></li>
                  <li><a href="/products/screening-washing/">Screening& Washing</a></li>
                  <li><a href="/products/mobile-crusher/">Mobile Crusher</a></li>
                  <li><a href="/products/beneficiation-equipment/">Beneficiation</a></li>
                </ul>
              </li>
              <li> <a href="/accessories/">Accessories</a>
                <ul>
                  <li><a href="/accessories/crushing-machine/">Crushing Machine</a></li>
                  <li><a href="/accessories/grinding-mill/">Grinding Mill</a></li>
                  <li><a href="/accessories/auxiliary-machinery/">Auxiliary Machinery</a></li>
                </ul>
              </li>
              <li> <a href="/solutions/">Solutions</a>
                <ul>
                  <li><a href="/solutions/aggregate-processing-plant/">Aggregate</a></li>
                  <li><a href="/solutions/mineral-production-plant/">Mineral</a></li>
                  <li><a href="/solutions/sand-making-production-line/">Sand Making Line</a></li>
                </ul>
              </li>
              
              <li><a href="/about-us.html">About us</a>
                
              </li>
              <li><a href="/contact.html">Contact us</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- header wrapper container -->
    <div class="content-wrapper container main">
      <div class="page-wrapper single-sidebar left-sidebar">
        <div class="page-header-wrapper gdl-border-x bottom">
          
          <h1 class="page-header-title"><?=$post["title"]?></h1>
          
        </div>
        <div class="row gdl-page-row-wrapper">
          <div class="mb0 twelve columns">
            <div class="row">
              <div class="gdl-page-item mb0 twelve columns">
                <div class="row">
                  <div class="twelve columns mb40">

                    <script type="text/javascript" src="/js/link_p.js"></script> 


                     <script type="text/javascript" src="/js/form.js"></script> 
                    <hr>

          

          <div class="portfolio-item-holder row">
             <?php echo $htmlcontent; ?>
           
          </div>


                      
                    </div>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- page wrapper --> 
  </div>
  <!-- post class -->
  <div class="footer-wrapper boxed-style"> 
    <!-- Get Footer Widget -->
    <div class="container footer-container">
      <div class="footer-widget-wrapper">
        <div class="row clearfix">
          <div class="three columns">
            <div class="custom-sidebar">
              <h3>Crushing equipment</h3>
              <ul>
                <li><a href="/products/crushing/pe-jaw-crusher.html">PE Jaw Crusher</a></li>
                <li><a href="/products/crushing/pew-jaw-crusher.html">PEW Jaw Crusher</a></li>
                <li><a href="/products/crushing/pf-impact-crusher.html">PF Impact Crusher</a></li>
                <li><a href="/products/crushing/pfw-impact-crusher.html">PFW Impact Crusher</a></li>
                <li><a href="/products/crushing/cs-cone-crusher.html">CS Cone Crusher</a></li>
                <li><a href="/products/crushing/hpc-cone-crusher.html">HPC Cone Crusher</a></li>
                <li><a href="/products/crushing/hpt-cone-crusher.html">HPT Cone Crusher</a></li>
                <li><a href="/products/crushing/vsi5x-crusher.html">VSI5X Crusher</a></li>
              </ul>
            </div>
          </div>
          <div class="three columns">
            <div class="custom-sidebar">
              <h3>Grinding equipment</h3>
              <ul>
                <li><a href="/products/grinding/lm-vertical-roller-mill.html">LM Vertical Roller Mills</a></li>
                <li><a href="/products/grinding/mtm-medium-speed-trapezium-mill.html">MTM Trapezium Grinder</a></li>
                <li><a href="/products/grinding/mtw-continental-trapezium-mill.html">MTW Milling Machine</a></li>
                <li><a href="/products/grinding/scm-ultrafine-mill.html">SCM Ultrafine Mill</a></li>
                <li><a href="/products/grinding/ball-mill.html">Ball Mill</a></li>
                <li><a href="/products/grinding/t130x-reinforced-ultrafine-mill.html">T130X Reinforced Ultrafine Mill</a></li>
                <li><a href="/products/grinding/raymond-mill.html">Raymond Mill</a></li>
              </ul>
            </div>
          </div>
          <div class="three columns ">
            <div class="custom-sidebar">
              <h3>Feeding& Conveying</h3>
              <ul>
                <li><a href="/products/feeding-convering/vibrating-feeder.html">Vibrating Feeder</a></li>
                <li><a href="/products/feeding-convering/belt-conveyor.html">Belt Conveyor</a></li>
                <li><a href="/products/feeding-convering/bwz-heavy-duty-apron-feeder.html">BWZ Feeder</a></li>
              </ul>
              <h3>Screening& Washing</h3>
              <ul>
                <li><a href="/products/screening-washing/vibrating-screen.html">Vibrating Screen</a></li>
                <li><a href="/products/screening-washing/xsd-sand-washing-machine.html">XSD Sand Washer</a></li>
                <li> <a href="/products/screening-washing/lsx-sand-washing-machine.html">LSX Sand Washing Machine</a> </li>
                <li> <a href="/products/screening-washing/ykn-vibrating-screen.html">YKN Vibrating Screen</a> </li>
              </ul>
            </div>
          </div>
          <div class="three columns mb0">
            <div class="custom-sidebar">
              <h3>Mobile Crushing Plant</h3>
              <ul>
                <li> <a href="/products/mobile-crusher/mobile-jaw-crusher.html">Mobile Jaw Crusher</a> </li>
                <li> <a href="/products/mobile-crusher/mobile-cone-crusher.html">Mobile Cone Crusher</a> </li>
                <li> <a href="/products/mobile-crusher/mobile-impact-crusher.html">Mobile Impact Crusher</a> </li>
                <li> <a href="/products/mobile-crusher/hydraulic-driven-track-mobile-plant.html">Hydraulic-driven Track Mobile Plant</a> </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- close row --> 
      </div>
    </div>
    <!-- Get Copyright Text -->
    <div class="copyright-outer-wrapper boxed-style">
      <div class="container copyright-container">
        <div class="copyright-wrapper clearfix">
          <div class="copyright-left"> Copyright © 2013-2017 MPM </div>
          <div class="copyright-right">
            <ul>
             <li><a href="/products/crushing/pf-impact-crusher.html">Impact Crusher</a></li>
              <li><a href="/products/grinding/raymond-mill.html">Raymond Mill</a></li>
              <li><a href="/products/mobile-crusher/mobile-impact-crusher.html">Mobile Crusher</a></li>
              <li><a href="/products/crushing/vsi-crusher.html">Sand Making Machine</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- footer wrapper --> 
  </div>
</div>
<!-- content wrapper --> 
<!-- body wrapper -->
</div>
<!-- body outer wrapper --> 
<script type="text/javascript" src="/js/jquery.js"></script> 
<script type="text/javascript" src="/js/superfish.js"></script> 
<script type="text/javascript" src="/js/supersub.js"></script> 
<script type='text/javascript'>
/* <![CDATA[ */
var ATTR = {"enable":"enable","width":"80","height":"45"};
/* ]]> */
</script> 
<script type="text/javascript" src="/js/jquery.fancybox.js"></script> 
<script type="text/javascript" src="/js/jquery.fancybox-thumbs.js"></script> 
<script type="text/javascript" src="/js/gdl-scripts.js"></script> 




<script type='text/javascript'>
/* <![CDATA[ */
var FLEX = {"animation":"slide","pauseOnHover":"enable","controlNav":"enable","directionNav":"enable","animationSpeed":"600","slideshowSpeed":"12000","pauseOnAction":"disable","thumbnail_width":"75","thumbnail_height":"50","controlsContainer":".flexslider"};
/* ]]> */
</script> 
<script type="text/javascript" src="/js/my.js"></script> 
</body>
</html>