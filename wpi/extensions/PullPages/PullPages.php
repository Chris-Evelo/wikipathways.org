<?php

$pullSite = "http://test.wikipathways.org/index.php";
$pullPages = "MediaWiki:PagesToPull";

$wgAutoloadClasses['PullPages'] = dirname(__FILE__) . '/PullPages_class.php';
$wgAutoloadClasses['PagePuller'] = dirname(__FILE__) . '/PagePuller.php';
