<!doctype html>
<?php defined( '_JEXEC' ) or die; ?>
<!DOCTYPE html>
<!--[if IEMobile 7 ]> <html dir="ltr" lang="<?php echo $this->language; ?>"class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html dir="ltr" lang="<?php echo $this->language; ?>" class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7 ]>    <html dir="ltr" lang="<?php echo $this->language; ?>" class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html dir="ltr" lang="<?php echo $this->language; ?>" class="no-js ie8 oldie"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html><!--<![endif]-->
<head>
 <?php include_once JPATH_THEMES.'/'.$this->template.'/preparation.php';?>
  <?php echo $loadJQUERY;?>
  <jdoc:include type="head" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <link rel="apple-touch-icon-precomposed" href="<?php echo $tpath; ?>/images/apple-touch-icon-57x57-precomposed.png">

  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $tpath; ?>/images/apple-touch-icon-72x72-precomposed.png">

  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $tpath; ?>/images/apple-touch-icon-114x114-precomposed.png">

   <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $tpath; ?>/images/apple-touch-icon-144x144-precomposed.png">

</head>

<body class="<?php echo (($menu->getActive() == $menu->getDefault()) ? ('front') : ('page')).' '.$active->alias.' '.$pageclass; ?>" style="font-family: '<?php echo $font; ?>';">

<h1>Hello</h1>
<jdoc:include type="modules" name="debug" />

<?php echo $loadResponsive;?>
</body>

</html>