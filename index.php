<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ITS - RMIT University</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="animate.css">

        <link href="style.css" rel="stylesheet">
    </head>

    <body>
    <?php
    //include("inc/DbConfig.php");

    ?>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a class="#">FAQ</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="jumbotron jumbo-rmit">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Internet Technology Services</h1>
                    <p>
                        Information Technology Services (ITS) provides RMIT University with information and communication technology in support of RMIT’s research, learning teaching and administrative activities.
                    </p>
                    <p>
                        <a class="btn btn-default" href="http://www1.rmit.edu.au/its" target="_blank">Learn More</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 animated fadeInLeft">
                <h1>Got a problem?</h1>
                <p>We're here for you!</p>
                <p>Our brand new ticketing system allows you to simply and easily discuss your problems with ITS staff so your problem can quickly be resolved.</p>
                <p><a class="btn btn-danger btn-lg" href="#">Submit a ticket</a></p>
            </div>
            <div class="col-md-4 animated fadeIn">
                <h1>Recent FAQs</h1>
                <p>
                    <i>Got a question? Ask other students!</i>
                </p><hr/>
                <p>
                    <b>I can't find my Pokemon!</b>
                    <br/>Simple! Stop playing.
                </p><hr/>
                <p>
                    <b>I ran out of toilet paper!</b>
                    <br/>Tough luck.
                </p><hr/>
                <p>
                    <b>I can't find a study space!</b>
                    <br/>We're a university of technology, not a university of study spaces.
                </p>
                <p><a class="btn btn-danger" href="#">View More...</a></p>
            </div>
            <div class="col-md-4 animated fadeInRight">
                <h1>My Tickets</h1>
                <p>You have no tickets.</p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
    </body>
</html>