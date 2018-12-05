<?php
//========================= core 파일. 변경해선 안 됨. ========================
$action_list = [];

function add_action($tag, $function) {
    global $action_list;
    $action_list[$tag][] = $function;
}

function do_action($tag) {
    global $action_list;

    if (!empty($action_list[$tag])) {
        foreach($action_list[$tag] as $function) {
            call_user_func($function);
        }
    }
}
