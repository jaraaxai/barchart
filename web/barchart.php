<?php


require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('barchart', 'prod', false);
sfContext::createInstance($configuration)->dispatch();
