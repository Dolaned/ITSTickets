<?php
$page = 'home';
if(isset($_GET['page'])) {
    $page = $_GET['page'];
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ITS Administration - RMIT University</title>

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" href="../animate.css">
    <link href="../admin.css" rel="stylesheet" />
</head>

<body>

<header>
    <div class="container">
        <a href="../admin/"><div class="rmit-brand">
            <span></span>
        </div></a>
        <div class="section-title"><h1></h1></div>
        <span class="material-icons hamburger">dehaze</span>
    </div>
</header>

<div class="container">
    <div id="sidebar">
        <ul class="no-list">
            <li><a href="../index.php">
                <span class="material-icons">arrow_back</span>
                <span>Back Home</span>
            </a></li>
            <li class="<?php echo ($page == 'search') ? "active" : "" ?>"><a href="?page=search">
                    <span class="material-icons">search</span>
                    <span>Search Tickets</span>
            </a></li>
            <li class="<?php echo ($page == 'view') ? "active" : "" ?>"><a href="?page=view">
                    <span class="material-icons">live_help</span>
                    <span>View Tickets</span>
            </a></li>
        </ul>
    </div>