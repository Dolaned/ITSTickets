<div class="jumbotron jumbo-rmit">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create Ticket</h1>
                <p>
                    All tickets are actively monitored and any spam may lead to a suspension in using ITS services.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading text-center"><h3>Fill out the form below and a representative will contact you soon</h3></div>
        <div class="panel-body">
            <div class="row center-block">
                <form class="form-horizontal" role="form" id="ticketform">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="subject"><h4>Subject:</h4></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-danger input-lg" id="subject" placeholder="I'm having difficulties.." name="subject">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="firstname"><h4>First Name:</h4></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input-lg" id="firstname" placeholder="Scooby" name="firstname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="lastname"><h4>Last Name:</h4></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control input-lg" id="lastname" placeholder="Dooby-Doo" name="lastname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email"><h4>Email:</h4></label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control input-lg" id="email" placeholder="scoobydoo@gmail.com" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="os"><h4>Operating System (OS):</h4></label>
                        <div class="col-sm-10">
                            <select class="form-control input-lg" id="os" name="os">
                                <option>Windows</option>
                                <option>Linux</option>
                                <option>Mac OS</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="comments"><h4>Software Issue:</h4></label>
                        <div class="col-sm-10">
                            <textarea class="form-control input-lg" rows="5" id="softwareissue" placeholder="What is your issue??" name="softwareissue"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="comments"><h4>Other Issues:</h4></label>
                        <div class="col-sm-10">
                            <textarea class="form-control input-lg" rows="5" id="comment" placeholder="Anything else you would like to tell us about?" name="comments"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default btn-lg">Submit</button>
                            <button class="btn btn-danger btn-lg" type="reset">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once('tpl/footer.php'); ?>
<script>
    $(document).ready(function() {
        $("#ticketform").validate({
            rules: {
                subject: {
                    required: true
                },
                softwareissue: {
                    required: true
                },
                firstname: {
                    required: true,
                    lettersonly: true,
                    nowhitespace: true
                },
                lastname: {
                    required: true,
                    lettersonly: true,
                    nowhitespace: true
                },
                email: {
                    required: true,
                    email: true
                },
            },
            messages: {
                firstname: {
                    required: "Please enter your first name",
                    lettersonly: "You can only enter letters"
                },
                lastname: {
                    required: "Please enter your last name",
                    lettersonly: "You can only enter letters"
                },
                softwareissue: {
                    required: "Please tell us what issue you're facing"
                },
                subject: {
                    required: "Please provide a subject"
                }
            },
        });
    });
    $('#ticketform input').blur(function()
    {
        if( !$(this).val() ) {
            $(this).parent('div').addClass('has-error');
        }
        else {
            $(this).parent('div').removeClass('has-error');
        }
    });
    $(document).ready(function()
    {
        $(document).on('submit', '#ticketform', function()
        {
            var data = $(this).serialize();
            $.ajax({
                type : 'POST',
                dataType : 'JSON',
                url  : 'ajax/create_ticket.php',
                data : data,
                success :  function(data)
                {
                    $('#ticketform').trigger("reset");
                    if(data != "error") {
                        // redirect to new ticket
                        window.location = "?page=view#"+data;
                    }
                    else {
                        // Get rid of the block of code below if you don't want the form to disappear after ticket submission and
                        // uncomment the block below this
                        $("#ticketform").fadeOut(250).hide(function()
                        {
                            $("#ticketform").fadeIn(250).show(function()
                            {
                                $(".panel-body").html('<p>An error occurred. Please try again.</p>');
                            });
                        });
                    }
                }
            });
            return false;
        });
    });
</script>