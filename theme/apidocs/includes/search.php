<?php
if(!defined('ROOT_PATH')){
    header("Location: /");
}
$hooks->do_action('docs_searching','apis');