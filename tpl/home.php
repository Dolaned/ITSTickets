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
            <p><a class="btn btn-danger btn-lg" href="?page=create">Submit a ticket</a></p>
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
            <h1>Ticket Search</h1>
            <form id="ticketSearch" method="POST">
                <input type="text" name="ticketid" class="form-control" placeholder="Search by: Ticket ID" /><hr/>
                <p>
                    <input type="submit" value="Search" class="btn btn-danger pull-right" />
                </p>
            </form>
        </div>
    </div>
</div>
<?php require_once('tpl/footer.php'); ?>