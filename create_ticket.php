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
        <div class="row">
            <form action="" id="ticketform">
                <!-- To be done -->
            </form>
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
                    url: "CREATE AJAX FILE LOCATION",
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
