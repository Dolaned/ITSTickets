<?php require_once('tpl/header.php'); ?>
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
                    <form class="form-horizontal" role="form" action="" id="ticketform">
                        <div class="form-group has-danger">
                              <label class="control-label col-sm-2" for="subject"><h4>Subject:</h4></label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control form-control-danger input-lg" id="subject" placeholder="I'm having difficulties..">
                              </div>
                              <div class="form-control-feedback">You cannot leave this field empty</div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="fname"><h4>First Name:</h4></label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control input-lg" id="fname" placeholder="Scooby">
                              </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="lname"><h4>Last Name:</h4></label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control input-lg" id="lname" placeholder="Dooby-Doo">
                              </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email"><h4>Email:</h4></label>
                              <div class="col-sm-10">
                                <input type="email" class="form-control input-lg" id="email" placeholder="scoobydoo@gmail.com">
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="control-label col-sm-2" for="os"><h4>Operating System (OS):</h4></label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control input-lg" id="os" placeholder="Windows/Linux/Mac">
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="control-label col-sm-2" for="comments"><h4>Comments:</h4></label>
                              <div class="col-sm-10">
                                <textarea class="form-control input-lg" rows="5" id="comment" placeholder="Anything else you would like to tell us about?"></textarea>
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
                firstname: 'required',
                lastname: 'required',
                studentId: 'required',
                email: {
                    required: true,
                    email: true
                },
                phoneNumber: {
                    minlength: 10,
                    maxlength: 10
                },
                message: {
                    required: true,
                    minlength: 20
                }
            },
            submitHandler: function(form) {
                var formData = $("#ticketform").serialize();
                $.ajax({
                    url: "inc/UserHandler.php",
                    dataType: "JSON",
                    method: "POST",
                    data: formData,
                    success: function(data) {
                        // form successful (if PHP sends any type of JSON result)
                    },
                    error: function() {
                        // something went wrong trying to submit
                    }
                });
            }
        });
    });
</script>
<?php require_once('tpl/end.php'); ?>
