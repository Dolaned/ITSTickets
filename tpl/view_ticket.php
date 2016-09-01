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
    <div class="row error" style="display:none;"><div class="alert alert-danger">An error occurred. Please try again!<p>The ticket ID you entered may not exist.</p></div></div>
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
            <div id="appender"></div>
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
                                <textarea style="max-width:100%;" placeholder="Type a reply here..." class="form-control" id="commentTxt" name="commentTxt"></textarea>
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
                    <p><b>Ticket ID:</b> <span id="ticketID"></span></p>
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
        var ticket;

        function formatTimestamp(timestamp) {
            var date = moment(timestamp).format("Do MMMM YYYY, h:mmA");
            return date;
        }

        function loadError() {
            ticket = [];
            $('.container.tickets > .row.error').delay(250).fadeIn(250);
            $('.container.tickets > .row.discussion').fadeOut(250);
        }

        /* Load data from ID */
        function performHash() {
            $("#appender").html("");
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
                            ticket = data;
                            $('.container.tickets > .row.error').fadeOut(250);
                            $('.container.tickets > .row.discussion').delay(250).fadeIn(250);

                            $("#ticketSubject").text('Subject: ' + data['subject']);
                            $("#ticketBody").html('<b>Software Issue: </b><br/> ' + data['softwareIssue'] + '<hr/><b>Comments: </b><br/>' + data['comments']);

                            $("#ticketUsername").text(data['firstName'] + ' ' + data['lastName']);
                            $("#ticketEmail").text(data['email']);
                            $("#ticketTime").text(formatTimestamp(data['date'] * 1000));
                            $("#ticketOS").text(data['operatingSystem']);
                            $("#ticketID").text(data['ticketid']);

                            if(data['status'] == "pending") {
                                $("#ticketStatus").html('<div class="alert alert-warning">This issue has not yet been resolved.</div>');
                            }
                            else if(data['status'] == "resolved") {
                                $("#ticketStatus").html('<div class="alert alert-success">This issue has been resolved.</div>');
                            }
                            else if(data['status'] == "unresolved") {
                                $("#ticketStatus").html('<div class="alert alert-danger">This issue was set as unresolved.</div>');
                            }
                            else if(data['status'] == "inprogress") {
                                $("#ticketStatus").html('<div class="alert alert-info">This issue is in progress of being resolved.</div>');
                            }

                            $.ajax({
                                type : 'POST',
                                dataType : 'JSON',
                                url : 'ajax/view_ticket_load_comments.php',
                                data : {id : hash},
                                success : function(data) {
                                    if(data != "error") {
                                        for(var d in data) {
                                            var d = data[d];
                                            if(Object.keys(d).length != 5) {
                                                continue;
                                            }

                                            var str = "";
                                            if(d['type'] == "student") {
                                                str += '<div class="row"><div class="col-md-1"></div><div class="col-md-9"><div class="panel panel-info reply-right"><div class="panel-heading">'+d['name']+'</div><div class="panel-body">'+d['comments']+'</div></div></div><div class="col-md-2"><div class="profile" style="background-image:url(../img/profile.png);"></div></div></div>';
                                            }
                                            else {
                                                str += '<div class="row"><div class="col-md-2"><div class="profile" style="background-image:url(../img/rmit-red.jpg);"></div></div><div class="col-md-9"><div class="panel panel-success reply-left"><div class="panel-heading">'+d['name']+'</div><div class="panel-body">'+d['comments']+'</div></div></div><div class="col-md-1"></div></div>';
                                            }

                                            $('#appender').append(str);
                                        }
                                    }
                                }
                            });
                        }
                    }
                    else {
                        // Get rid of the block of code below if you don't want the form to disappear after ticket submission and
                        // uncomment the block below this
                        loadError();
                    }
                },
                error : function() {
                    loadError();
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
        });

        $("#sendMessage").validate({
            rules: {
                commentTxt: {
                    required: true,
                    minlength: 5
                }
            }
        });

        $(document).on('submit', '#sendMessage', function(e)
        {
            e.preventDefault();
            if(ticket == null || Object.keys(ticket).length < 1) {
                return false;
            }

            var data = {
                id: ticket['ticketid'],
                name: ticket['firstName'] + ' ' + ticket['lastName'],
                text: $("#commentTxt").val()
            };

            $.ajax({
                type : 'POST',
                dataType : 'JSON',
                url : 'ajax/view_ticket_create_comment.php',
                data : data,
                success : function(data) {
                    if(data == "success") {
                        location.reload();
                    }
                    else {
                        alert("An error occurred. Please try again.");
                    }
                }
            });

            return false;
        });
    });
</script>