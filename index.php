<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

// if custom-index.php file exists the whole template is overriden
if(file_exists(JPATH_BASE . '/templates/' . $this->template . 'custom-index.php')) :
	include 'custom-index.php'; 
else :

// Enable Joomla Bootstrap and jQuery UI framework;
JHtml::_('bootstrap.framework');
JHtml::_('jquery.ui', array('core', 'sortable'));

// Check if we are on the home page
if(JRequest::getVar('Itemid') == JFactory::getApplication()->getMenu()->getDefault()->id){ $home = true; }

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
<script src="<?php echo JURI::root(true); ?>/templates/<?php echo $this->template; ?>/js/html5shiv.js" type="text/javascript"></script>
<script src="<?php echo JURI::root(true); ?>/templates/<?php echo $this->template; ?>/js/selectivizr.js" type="text/javascript"></script>
<![endif]-->
<?php if($home) {
	echo $this->params->get('google_site_verification') ? '<meta name="google-site-verification" content="' . $this->params->get('google_site_verification') . '" />' . "\n" : '';
	echo $this->params->get('msvalidate') ? '<meta name="msvalidate.01" content="' . $this->params->get('msvalidate') . '" />' . "\n" : '';
	echo $this->params->get('p_domain_verify') ? '<meta name="p:domain_verify" content="' . $this->params->get('p_domain_verify') . '"/>' . "\n" : '';
	echo '<link href="' . JURI::root() . '" rel="canonical" />' . "\n";
} ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width">
<jdoc:include type="head" />
<link href="<?php echo JURI::root(true); ?>/templates/<?php echo $this->template; ?>/css/styles.css?v=<?php echo date("YmdHis", filemtime(JPATH_BASE . '/templates/' . $this->template . '/css/styles.css')); ?>" rel="stylesheet" type="text/css" />
<?php if(file_exists(JPATH_BASE . '/templates/' . $this->template . '/css/ie9.css')): ?>
<!--[if lte IE 9]>
<link href="<?php echo JURI::root(true); ?>/templates/<?php echo $this->template; ?>/css/ie9.css" rel="stylesheet" type="text/css" />
<![endif]-->
<?php endif;
if(file_exists(JPATH_BASE . '/templates/' . $this->template . '/css/ie8.css')): ?>
<!--[if lte IE 8]>
<link href="<?php echo JURI::root(true); ?>/templates/<?php echo $this->template; ?>/css/ie8.css" rel="stylesheet" type="text/css" />
<![endif]-->
<?php endif;
if(file_exists(JPATH_BASE . '/templates/' . $this->template . '/css/ie7.css')): ?>
<!--[if lte IE 7]>
<link href="<?php echo JURI::root(true); ?>/templates/<?php echo $this->template; ?>/css/ie7.css" rel="stylesheet" type="text/css" />
<![endif]-->
<?php endif; ?>
<script src="<?php echo JURI::root(true); ?>/templates/<?php echo $this->template; ?>/js/lyquix.js?v=<?php echo date("YmdHis", filemtime(JPATH_BASE . '/templates/' . $this->template . '/js/lyquix.js')); ?>" type="text/javascript"></script>
<?php echo $this->params->get('lqx_options') ? '<script type="text/javascript">lqx.setOptions(' . $this->params->get('lqx_options') . ');</script>' : ''; ?>
<?php if(file_exists(JPATH_BASE . '/templates/' . $this->template . '/images/favicon.ico')): ?>
<link href="<?php echo JURI::root(true); ?>/templates/<?php echo $this->template; ?>/images/favicon.ico" rel="shortcut icon" />
<?php endif;
if(file_exists(JPATH_BASE . '/templates/' . $this->template . '/images/apple-touch-icon.png')): ?>
<link href="<?php echo JURI::root(true); ?>/templates/<?php echo $this->template; ?>/images/apple-touch-icon.png" rel="apple-touch-icon" />
<?php endif;
if(file_exists(JPATH_BASE . '/templates/' . $this->template . '/images/apple-touch-icon-76x76.png')): ?>
<link href="<?php echo JURI::root(true); ?>/templates/<?php echo $this->template; ?>/images/apple-touch-icon-76x76.png" rel="apple-touch-icon" sizes="76x76" />
<?php endif;
if(file_exists(JPATH_BASE . '/templates/' . $this->template . '/images/apple-touch-icon-120x120.png')): ?>
<link href="<?php echo JURI::root(true); ?>/templates/<?php echo $this->template; ?>/images/apple-touch-icon-120x120.png" rel="apple-touch-icon" sizes="120x120" />
<?php endif;
if(file_exists(JPATH_BASE . '/templates/' . $this->template . '/images/apple-touch-icon-152x152.png')): ?>
<link href="<?php echo JURI::root(true); ?>/templates/<?php echo $this->template; ?>/images/apple-touch-icon-152x152.png" rel="apple-touch-icon" sizes="152x152" />
<?php endif;
echo $this->params->get('ga_account') ? "<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', '" . $this->params->get('ga_account') . "', 'auto');
ga('send', 'pageview');
</script>" : ''; ?>
<?php echo $this->params->get('addthis_pubid') ? '<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=' . $this->params->get('addthis_pubid') . '"></script>' : ''; ?>
<?php if(file_exists(JPATH_BASE . '/templates/' . $this->template . '/js/scripts.js')): ?>
<script src="<?php echo JURI::root(true); ?>/templates/<?php echo $this->template; ?>/js/scripts.js?v=<?php echo date("YmdHis", filemtime(JPATH_BASE . '/templates/' . $this->template . '/js/scripts.js')); ?>" type="text/javascript"></script>
<?php endif; ?>
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
<?php 
// if blank-page parameter is set, only the component will be output
if(!$this->params->get('blank_page',0)) :
	// if custom-index-body.php file exists then the body of the template is overriden
	if(file_exists(JPATH_BASE . '/templates/' . $this->template . 'custom-index-body.php')) :
		include 'custom-index-body.php'; 
	else :
?>
<header>
	
	<?php if($this->countModules('util-1') || $this->countModules('util-2') || $this->countModules('util-3')): ?>
	<div class="row util">
		<div class="container cf">
			<div class="util-1 blk4 blkgroup">
				<jdoc:include type="modules" name="util-1" />
			</div>
			<div class="util-2 blk4 blkgroup">
				<jdoc:include type="modules" name="util-2" />
			</div>
			<div class="util-3 blk4 blkgroup">
				<jdoc:include type="modules" name="util-3" />
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<?php if($this->countModules('header-1') || $this->countModules('header-2') || $this->countModules('header-3')): ?>
	<div class="row header">
		<div class="container cf">
			<div class="header-1 blk4 blkgroup">
				<jdoc:include type="modules" name="header-1" />
			</div>
			<div class="header-2 blk4 blkgroup">
				<jdoc:include type="modules" name="header-2" />
			</div>
			<div class="header-3 blk4 blkgroup">
				<jdoc:include type="modules" name="header-3" />
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<?php if($this->countModules('top-1') || $this->countModules('top-2') || $this->countModules('top-3')): ?>
	<div class="row top">
		<div class="container cf">
			<div class="top-1 blk4 blkgroup">
				<jdoc:include type="modules" name="top-1" />
			</div>
			<div class="top-2 blk4 blkgroup">
				<jdoc:include type="modules" name="top-2" />
			</div>
			<div class="top-3 blk4 blkgroup">
				<jdoc:include type="modules" name="top-3" />
			</div>
		</div>
	</div>
	<?php endif; ?>
	
</header>

<main class="row main">
	
	<div class="container cf">
		
		<jdoc:include type="message" />
		
		<?php if($this->countModules('main-top')): ?>
		<div class="main-top">
			<jdoc:include type="modules" name="main-top" />
		</div>
		<?php endif; ?>
		
		<div class="main-middle blk20 blkgroup">
			
			<?php if($this->countModules('main-left')): ?>
			<div class="main-left blk4 blkgroup">
				<jdoc:include type="modules" name="main-left" />
			</div>
			<?php endif; ?>

			<div class="main-center blk<?php echo 12 - ($this->countModules('main-left') ? 4 : 0) - ($this->countModules('main-right') ? 4 : 0)  ?> blkgroup">
				
				<?php if($home): ?>
				<jdoc:include type="modules" name="main-center" />
				<?php else: ?>
				<article>
					<jdoc:include type="component" />
				</article>
				<?php endif; ?>
				
			</div>

			<?php if($this->countModules('main-right')): ?>
			<div class="main-right blk4 blkgroup">
				<jdoc:include type="modules" name="main-right" />
			</div>
			<?php endif; ?>
			
		</div>
		
		<?php if($this->countModules('main-bottom')): ?>
		<div class="main-bottom">
			<jdoc:include type="modules" name="main-bottom" />
		</div>
		<?php endif; ?>
		
	</div>
	
</main>

<footer>

	<?php if($this->countModules('bottom-1') || $this->countModules('bottom-2') || $this->countModules('bottom-3')): ?>
	<div class="row bottom">
		<div class="container cf">
			<div class="bottom-1 blk4 blkgroup">
				<jdoc:include type="modules" name="bottom-1" />
			</div>
			<div class="bottom-2 blk4 blkgroup">
				<jdoc:include type="modules" name="bottom-2" />
			</div>
			<div class="bottom-3 blk4 blkgroup">
				<jdoc:include type="modules" name="bottom-3" />
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<?php if($this->countModules('footer-1') || $this->countModules('footer-2') || $this->countModules('footer-3')): ?>
	<div class="row footer">
		<div class="container cf">
			<div class="footer-1 blk4 blkgroup">
				<jdoc:include type="modules" name="footer-1" />
			</div>
			<div class="footer-2 blk4 blkgroup">
				<jdoc:include type="modules" name="footer-2" />
			</div>
			<div class="footer-3 blk4 blkgroup">
				<jdoc:include type="modules" name="footer-3" />
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<?php if($this->countModules('copyright-1') || $this->countModules('copyright-2') || $this->countModules('copyright-3')): ?>
	<div class="row copyright">
		<div class="container cf">
			<div class="copyright-1 blk4 blkgroup">
				<jdoc:include type="modules" name="copyright-1" />
			</div>
			<div class="copyright-2 blk4 blkgroup">
				<jdoc:include type="modules" name="copyright-2" />
			</div>
			<div class="copyright-3 blk4 blkgroup">
				<jdoc:include type="modules" name="copyright-3" />
			</div>
		</div>
	</div>
	<?php endif; ?>
	
</footer>
<?php 
	endif; // endif for including custom-index-body.php
else:  // outputing a blank page
?>
<jdoc:include type="component" />
<?php endif; // endif for blank page ?>

<!--[if lte IE 8]>
<link href="<?php echo JURI::root(true); ?>/templates/<?php echo $this->template; ?>/css/ie8-alert.css" rel="stylesheet" type="text/css" />
<div class="ie8-alert">You are using an unsupported version of Internet Explorer. To ensure security, performance, and full functionality, <a href="http://browsehappy.com/" target="_blank">please upgrade to an up-to-date browser.</a></div>
<![endif]-->

<?php echo $this->params->get('disqus_shortname') ? '<script type="text/javascript" src="//' . $this->params->get('disqus_shortname') . '.disqus.com/embed.js"></script>' : ''; ?>

<jdoc:include type="modules" name="body" />

</body>
</html>
<?php endif; // endif for including custom-index.php