<?php
//========================= core 파일. 변경해선 안 됨. ========================

require 'filter-init.php';
require 'filter-custom.php';
?>

<h1><?= apply_filters('the_content', '0123456789') ?></h1>

