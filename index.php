<?php
    require_once('tpl/header.php');
    switch($page) {
        default:
        case 'home':
            require_once('/tpl/home.php');
            break;

        case 'faq':
            require_once('/tpl/faq.php');
            break;

        case 'create':
            require_once('/tpl/create_ticket.php');
            break;

        case 'view':
            require_once('/tpl/view_ticket.php');
            break;
    }
    require_once('tpl/end.php');
?>
