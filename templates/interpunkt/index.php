<?php defined('_JEXEC') or die('Restricted access'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<jdoc:include type="head" />
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/assets/css/template.css" type="text/css" media="screen" />
</head>

<body>
<div id="all" class="clearfix">
	<div id="header" class="clearfix">

	<div id="topmenu_all">
 	<div id="topmenu" class="right">
    <jdoc:include type="modules" name="topmenu" style="none" />
    </div>
     <div id="topmenu_extra" class="right">
    <jdoc:include type="modules" name="topmenu_extra" style="none" />
    </div>
    <div id="topmenu_extra2" class="right">
    <jdoc:include type="modules" name="topmenu_extra2" style="none" />
    </div>
		</div>

    <div>
    <a href="<?php echo $this->baseurl ?>" title="iemilie.com - Blue Jays"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/assets/images/logo.png"  width="265" height="50" alt="iemilie.com - Blue Jays" title="iemilie.com - Blue Jays" /></a>
    </div>
    
    <div id="menu_bjtop" class="right clearfix">
    <jdoc:include type="modules" name="menu" style="none" />
    </div>
	</div>
	    
    <?php if($this->countModules('top1 or top2')) : ?>
    <div id="top">
    	<div id="top2" class="right">
        <jdoc:include type="modules" name="top2" style="xhtml" />
        <jdoc:include type="modules" name="breadcrumb" style="xhtml" />
        </div>
    	<div id="top1">
        <jdoc:include type="modules" name="top1" style="xhtml" />
        </div>
    </div>
    <?php endif; ?>

    <?php
       if(JRequest::getVar('view') != 'frontpage') {
    ?>
    	<div id="content" class="clearfix"> 
    	<?php 
    		 if($this->countModules('left')) : 
    		 ?>
    	 <div id="left" class="left equals">
        <jdoc:include type="modules" name="left" style="xhtml" />
        </div> 
        <?php endif; ?>
        <div id="component" class="equals <?php if($this->countModules('left')) : ?>half left<?php  endif; ?>"> 
        <jdoc:include type="modules" name="breadcrumb" style="xhtml" />
    	<jdoc:include type="component" />
        </div> 
    </div> 
    <?php  }
    
     ?>
    
    <?php if($this->countModules('user1')) : ?>
    <div id="user1">
    <jdoc:include type="modules" name="user1" style="xhtml" />
    </div>
    <?php endif; ?>
    
    <div style="width:100%; height:3px; margin:0; background:#064780;"></div>
    
    <?php
	    if(JRequest::getVar('view') == 'frontpage') {
    	if($this->countModules('bottom1 or bottom2 or bottom3')) : ?>
    <div id="bottom" class="clearfix">
    	<?php if($this->countModules('bottom1')) : ?>
    	<div id="bottom1" class="left">
        <jdoc:include type="modules" name="bottom1" style="xhtml" />
        </div>
        <?php endif; ?>
    	<?php if($this->countModules('bottom2')) : ?>
    	<div id="bottom2" class="left equals">
        <jdoc:include type="modules" name="bottom2" style="xhtml" />
        </div>
        <?php endif; ?>
    	<?php if($this->countModules('bottom3')) : ?>
    	<div id="bottom3" class="left equals">
        <jdoc:include type="modules" name="bottom3" style="xhtml" />
        </div>
        <?php endif; ?>
    </div>
    <?php endif; 
	    }?>
    
	<?php
	if(JRequest::getVar('view') == 'frontpage') {
	?>
    <div style="width:100%; height:3px; margin:0; background:#064780;"></div>
	<div id="footer"  class="moduletable clreafix">
    <jdoc:include type="modules" name="footer" style="xhtml" />
    </div>
    <?php
	}
	?>
	
    <div style="color:#064780;margin-top:10px;margin-bottom:12px;text-align:right;">Copyright &copy; 2012, iemilie.com. All Rights Reserved.</div>
    
</div>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-3360532-4']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>