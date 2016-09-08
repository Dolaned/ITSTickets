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
                Some problems may have a solution on our Frequently Asked Questions page.
            </p>
            <ul>
                <li>When can I contact ITS?</li>
                <li>Where are walk-in locations at?</li>
                <li>What if I have a problem after-hours?</li>
            </ul>
            <p><a class="btn btn-danger" href="?page=faq">View FAQs...</a></p>
        </div>
        <div class="col-md-4 animated fadeInRight">
            <h1>Ticket Search</h1>
            <p>View the progress of your ticket by entering the associated Ticket ID:</p>
            <form id="ticketSearch" method="POST">
                <input type="text" name="ticketid" id="ticketid" class="form-control" placeholder="Search by: Ticket ID" /><hr/>
                <p>
                    <input type="submit" value="Search" class="btn btn-danger pull-right" />
                </p>
            </form>
        </div>
    </div>
</div>
<?php require_once('tpl/footer.php'); ?>

<script>
    $(document).ready(function() {
        $(document).on('submit', '#ticketSearch', function(e){
            e.preventDefault();

            var d = {
                id: $("#ticketid").val()
            };

            $.ajax({
                type : 'POST',
                dataType : 'JSON',
                url: 'ajax/ticket_search.php',
                data : d,
                success: function(data){
                    if(data != "error") {
                        // redirect to new ticket
                        window.location = "?page=view#"+d['id'];
                    }
                    else
                    {
                        alert("An error occurred. Please try again.");
                    }
                }
            });



        });
    });
</script>

