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
                <div><a class="btn">View</a><a class="btn btn-red">Delete</a></div>
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

<?php require_once('../tpl/staff_footer.php'); ?>