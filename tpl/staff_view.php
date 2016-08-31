<main>
    <h1 class="page-title">View Tickets</h1>
    <div class="content">
        <div class="table">
            <div class="head">
                <div>Ticket ID</div>
                <div>Email Address</div>
                <div>Submission Date</div>
                <div>Status</div>
                <div>Actions</div>
            </div>
            <div class="body">
                <div>1234-ABCD</div>
                <div>steve@jobs.com</div>
                <div>1970-01-01</div>
                <div><span class="status pending">Pending</span></div>
                <div><a class="btn">View</a><a class="btn btn-red">Delete</a><a class="btn btn-green addComment">Add Comment</a></div>
            </div>
            <div class="body">
                <div>1234-ABCD</div>
                <div>steve@jobs.com</div>
                <div>1970-01-01</div>
                <div><span class="status resolved">Resolved</span></div>
                <div><a class="btn">View</a><a class="btn btn-red">Delete</a></div>
            </div>
            <div class="body">
                <div>1234-ABCD</div>
                <div>steve@jobs.com</div>
                <div>1970-01-01</div>
                <div><span class="status closed">Closed</span></div>
                <div><a class="btn">View</a><a class="btn btn-red">Delete</a></div>
            </div>
        </div>
    </div>
</main>

<div id="overlay">
    <div class="container">
        <h1>Reply to conversation</h1>
        <div class="content">
            <form id="sendMessage">
                <textarea placeholder="Type a reply here..." id="commentTxt" style="max-width:100%;min-height:150px;" name="commentTxt"></textarea>
                <hr/>
                <p>
                    <input type="submit" class="btn btn-green" value="Send Message" />
                </p>
            </form>
        </div>
    </div>
</div>

<?php require_once('../tpl/staff_footer.php'); ?>
<script>
    $(document).ready(function() {
        $('.addComment').on("click", function() {
            $("#overlay").addClass("show");
        });
    });
</script>
