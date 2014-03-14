<?php

/* Register a basic autoloader */
require_once 'AutoLoader.php';
AutoLoader::register('src');

/* Create a packer */
$packer = new \Candidate\BoxPacker\DeveloperTestPacker();

/* Create some test boxes */
$boxes = [];
// Create your boxes here

/* Add boxes to packer */
$packer->addBoxes($boxes);

/* Create some test items */
$items = [];
// Create your items here

/* Add items to packer */
$packer->addItems($items);

/* Pack */
$packed_boxes = $packer->pack();

/* Output - var_dump is fine */
var_dump($packed_boxes);
