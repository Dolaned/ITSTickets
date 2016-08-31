<?php
    require_once('../tpl/staff_header.php');
    switch($page) {
        default:
        case 'home':
            require_once('../tpl/staff_home.php');
            break;

        case 'search':
            require_once('../tpl/staff_search.php');
            break;

        case 'view':
            require_once('../tpl/staff_view.php');
            break;
    }
    require_once('../tpl/end.php');
?>