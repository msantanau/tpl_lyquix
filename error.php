<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
$app = JFactory::getApplication();

// Check if we are on a mobile device, whether smartphone or tablet
require_once('php/Mobile_Detect.php');
$detect = new Mobile_Detect;
if($detect->isMobile()){
	$mobile = true;
	if($detect->isTablet()){ $tablet = true; }
	else { $phone = true; }
}
?><!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" >
<head>
<!--[if IE]>
<script type="text/javascript">if(typeof console=='undefined'||typeof console.log=='undefined'){console={};console.log=function(){};}</script>
<![endif]-->
<!--[if lt IE 9]>
<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/html5shiv.js" type="text/javascript"></script>
<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/selectivizr.js" type="text/javascript"></script>
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Error <?php echo $this->error->getCode(); ?>: <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></title>
<?php if ($app->get('debug_lang', '0') == '1' || $app->get('debug', '0') == '1') : ?>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/media/cms/css/debug.css" type="text/css" />
<?php endif; ?>
<script src="<?php echo $this->baseurl ?>/media/jui/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo $this->baseurl ?>/media/jui/js/jquery-noconflict.js" type="text/javascript"></script>
<script src="<?php echo $this->baseurl ?>/media/jui/js/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo $this->baseurl ?>/media/jui/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $this->baseurl ?>/media/jui/js/jquery.ui.core.min.js" type="text/javascript"></script>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/styles.css?v=<?php echo date("YmdHis", filemtime(JPATH_BASE . '/templates/' . $this->template . '/css/styles.css')); ?>" rel="stylesheet" type="text/css" />
<!--[if lte IE 9]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ie9.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if lte IE 8]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ie8.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if lte IE 7]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ie7.css" rel="stylesheet" type="text/css" />
<![endif]-->
<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/scripts.js?v=<?php echo date("YmdHis", filemtime(JPATH_BASE . '/templates/' . $this->template . '/js/scripts.js')); ?>" type="text/javascript"></script>
<?php echo $this->params->get('lqx_options') ? '<script type="text/javascript">lqx.setOptions(' . $this->params->get('lqx_options') . ');</script>' : ''; ?>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/favicon.ico" rel="shortcut icon" />
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/apple-touch-icon.png" rel="apple-touch-icon" />
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/apple-touch-icon-76x76.png" rel="apple-touch-icon" sizes="76x76" />
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/apple-touch-icon-120x120.png" rel="apple-touch-icon" sizes="120x120" />
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/apple-touch-icon-152x152.png" rel="apple-touch-icon" sizes="152x152" />
<?php echo $this->params->get('ga_account') ? "<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', '" . $this->params->get('ga_account') . "', 'auto');
ga('send', 'pageview');
</script>
<!-- End Google Analytics -->" : ''; ?>
<jdoc:include type="modules" name="head" />
</head>
<body class="<?php 
echo ($home ? 'home ' : '').
	($mobile ? 'mobile ' : '').
	($phone ? 'phone ' : '').
	($tablet ? 'tablet ' : '').
	JRequest::getVar('option').
	' view_'.JRequest::getVar('view').
	(is_null(JRequest::getVar('task')) ? '' : ' task_'.JRequest::getVar('task'));
?>">
<script type="text/javascript">
(function(){
	w = jQuery(window).width();
	if(w < 640) s = 'xs';
	if(w >= 640) s = 'sm';
	if(w >= 960) s = 'md';
	if(w >= 1280) s = 'lg';
	if(w >= 1600) s = 'xl';
	jQuery('body').attr('screen',s);
})();
</script>
<div class="container cf">
	<h1>Error <?php echo $this->error->getCode(); ?>:<br /><?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></h1>
	<p><strong><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></strong></p>
	<ul>
		<li><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
		<li><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
		<li><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
		<li><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
		<li><?php echo JText::_('JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND'); ?></li>
		<li><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></li>
	</ul>
	<p><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></p>
	<div id="techinfo">
		<p><?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></p>
		<?php if ($this->debug) : ?>
			<p><?php echo $this->renderBacktrace(); ?></p>
		<?php endif; ?>
	</div>
</div>
<!--[if lte IE 8]>
<div class="ie8-alert">You are using an unsupported version of Internet Explorer. To ensure security, performance, and full functionality, <a href="http://browsehappy.com/" target="_blank">please upgrade to an up-to-date browser.</a></div>
<![endif]-->
<?php echo $this->params->get('addthis_pubid') ? '<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=' . $this->params->get('addthis_pubid') . '"></script><script type="text/javascript">addthis.layers({\'theme\':\'transparent\',\'share\':{\'position\':\'left\',\'numPreferredServices\':5}});</script>' : ''; ?>
<?php echo $this->params->get('disqus_shortname') ? '<script type="text/javascript" src="//' . $this->params->get('disqus_shortname') . '.disqus.com/embed.js"></script>' : '' ?>
</body>
</html>