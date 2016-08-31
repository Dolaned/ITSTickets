<div class="jumbotron jumbo-rmit">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>My Tickets</h2>
            </div>
        </div>
    </div>
</div>

<div class="container tickets">
    <div class="row error" style="display:none;"><div class="alert alert-danger">An error occurred. Please try again!</div></div>
    <div class="row discussion">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-9">
                    <div class="panel panel-info reply-right">
                        <div class="panel-heading" id="ticketSubject"></div>
                        <div class="panel-body" id="ticketBody"></div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="profile" style="background-image:url(../img/profile.png);"></div>
                </div>
            </div>
            <!--<div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-9">
                    <div class="panel panel-info reply-right">
                        <div class="panel-heading">
                            Nicholas Zuccarelli
                        </div>
                        <div class="panel-body">
                            I would also like to mention that this is on a friend's account of mine.
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="profile"style="background-image:url(../img/profile.jpg);"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="profile" style="background-image:url(../img/rmit-red.jpg);"></div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-success reply-left">
                        <div class="panel-heading">
                            Bob Smith
                        </div>
                        <div class="panel-body">
                            Hi Nick! Give us a second and we will send you a link that will allow you to securely reset your password.
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="profile" style="background-image:url(../img/rmit-red.jpg);"></div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-success reply-left">
                        <div class="panel-heading">
                            Bob Smith
                        </div>
                        <div class="panel-body">
                            Thanks for holding Nick. Here is your password reset link: <a href="http://google.com">http://google.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>-->
            <hr/>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-9">
                    <div class="panel panel-info reply-right">
                        <div class="panel-heading">
                            <b>Reply to this conversation</b>
                        </div>
                        <div class="panel-body">
                            <form id="sendMessage">
                                <textarea placeholder="Type a reply here..." class="form-control"></textarea>
                                <hr/>
                                <p>
                                    <input type="submit" class="pull-right btn btn-primary" value="Send Message" />
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="profile"style="background-image:url(../img/profile.png);"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div id="ticketStatus"></div>

            <div class="panel panel-info">
                <div class="panel-heading">
                    Ticket Details
                </div>
                <div class="panel-body">
                    <p><b>Name:</b> <span id="ticketUsername"></span></p>
                    <p><b>Email:</b> <span id="ticketEmail"></span></p>
                    <p><b>Ticket Date:</b> <span id="ticketTime"></span></p>
                    <p><b>Operating System:</b> <span id="ticketOS"></span></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('tpl/footer.php'); ?>
<script>
    $(document).ready(function()
    {
        function formatTimestamp(timestamp) {
            var date = moment(timestamp).format("Do MMMM YYYY, h:mmA");
            return date;
        }

        function loadError() {
            $('.container.tickets > .row.error').delay(250).fadeIn(250);
            $('.container.tickets > .row.discussion').fadeOut(250);
        }

        /* Load data from ID */
        function performHash() {
            var hash = window.location.hash.substring(1);
            $.ajax({
                type : 'POST',
                dataType : 'JSON',
                url  : 'ajax/view_ticket_load.php',
                data : {id: hash},
                success :  function(data)
                {
                    if(data != "error") {
                        if(!(data instanceof Object)) {
                            loadError();
                        }
                        else {
                            $('.container.tickets > .row.error').fadeOut(250);
                            $('.container.tickets > .row.discussion').delay(250).fadeIn(250);

                            $("#ticketSubject").text('Subject: ' + data['subject']);
                            $("#ticketBody").html('<b>Software Issue: </b><br/> ' + data['softwareIssue'] + '<hr/><b>Comments: </b><br/>' + data['comments']);

                            $("#ticketUsername").text(data['firstName'] + ' ' + data['lastName']);
                            $("#ticketEmail").text(data['email']);
                            $("#ticketTime").text(formatTimestamp(data['date'] * 1000));
                            $("#ticketOS").text(data['operatingSystem']);

                            if(data['status'] == "pending") {
                                $("#ticketStatus").html('<div class="alert alert-warning">This issue has not yet been resolved.</div>');
                            }
                            else if(data['status'] == "resolved") {
                                $("#ticketStatus").html('<div class="alert alert-success">This issue has been resolved.</div>');
                            }
                            else if(data['status'] == "closed") {
                                $("#ticketStatus").html('<div class="alert alert-danger">This issue was not resolved but has been closed.</div>');
                            }
                        }
                    }
                    else {
                        // Get rid of the block of code below if you don't want the form to disappear after ticket submission and
                        // uncomment the block below this
                        loadError();
                    }
                }
            });
        }

        if(window.location.hash) {
            performHash();
        }
        else {
            window.location = "?page=home";
        }

        $(window).on("hashchange", function() {
            performHash();
        })
    });
</script>