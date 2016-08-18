<?php

include('TicketPDO.php');

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript">
        $(document).ready(function()
        {
            $(document).on('submit', '#reg-form', function()
            {
                var data = $(this).serialize();

                $.ajax({

                    type : 'POST',
                    url  : 'submit.php',
                    data : data,
                    success :  function(data)
                    {
                        $("#reg-form").fadeOut(500).hide(function()
                        {
                            $(".result").fadeIn(500).show(function()
                            {
                                $(".result").html(data);
                            });
                        });
                    }
                });
                return false;
            });
        });
    </script>
    <style type="text/css">
        *{margin:0;padding:0;}
        #container
        {
            margin:50px auto;
            padding:15px;
            border:solid #cdcdcd 1px;
            width:860px;
            height:430px;
            background:#f9f9f9;
        }
        table,td
        {
            width:100%;
            border-collapse:collapse;
            padding:10px;
        }
        input
        {
            width:100%;
            height:35px;
            text-align:center;
            border:solid #cddcdc 2px;
            font-family:Verdana, Geneva, sans-serif;
            border-radius:3px;
        }
        button
        {
            text-align:center;
            width:50%;
            height:35px;
            border:0;
            font-family:Verdana, Geneva, sans-serif;
            border-radius:3px;
            background:#00a2d1;
            color:#fff;
            font-weight:bolder;
            font-size:18px;
        }
        hr
        {
            border:solid #cecece 1px;
        }
        #header
        {
            width:100%;
            height:50px;
            background:red;
            text-align:center;
        }
        #header label
        {
            font-family:Verdana, Geneva, sans-serif;
            font-size:35px;
            color:#f9f9f9;
        }
        a{
            color:#00a2d1;
            text-decoration:none;
        }
    </style>
</head>

<body>

<div id="header">
    <label>Tickets</label>
</div>
<br /><br />


<div id="container">
    <?php
    print "<table border=1>";
    print "<tr><td>Id</td><td>Subject</td><td>First Name</td><td>Last Name</td><td>Email</td><td>Opearting Sytem</td><td>Software Issue</td><td>Comments</td><td>Status</td></tr>";
    $pdo = TicketPDO::getInstance();
    $results = $pdo->getData();
    foreach($results as $row)
    {
        print "<tr><td>".$row['id']."</td>";
        print "<td>".$row['subject']."</td>";
        print "<td>".$row['firstName']."</td>";
        print "<td>".$row['lastName']."</td>";
        print "<td>".$row['email']."</td>";
        print "<td>".$row['operatingSystem']."</td>";
        print "<td>".$row['softwareIssue']."</td>";
        print "<td>".$row['comments']."</td>";
        print "<td>".$row['status']."</td></tr>";
    }
    print "</table>";
    ?>
</div>

</body>

</html>
