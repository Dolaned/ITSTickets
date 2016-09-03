<main>
    <h1 class="page-title">Ticket Search</h1>
    <div class="content">
        <form id="searchForm">
            <label for="ticket">Search by Ticket ID:</label>
            <input id="ticket" name="id" type="text" placeholder="Ticket ID" />
            <hr />
            <label for="email">Search by Email Address:</label>
            <input id="email" name="email" type="email" placeholder="Email Address" />

            <div class="split">
                <div>
                    <label for="sortBy">Sort By:</label>
                    <select id="sortBy" name="orderBy">
                        <option value="1" selected>Ticket Status</option>
                        <option value="0">Date</option>
                    </select>
                </div>
                <div>
                    <label for="ascDesc">Order:</label>
                    <select id="ascDesc" name="ascdesc">
                        <option value="1" selected>Ascending</option>
                        <option value="0">Descending</option>
                    </select>
                </div>
            </div>
            <hr />

            <input type="submit" value="Search" class="btn" />
        </form>
    </div>
</main>

<main id="searchResults" style="display:none;">
    <h1 class="page-title" id="tableTitle"></h1>
    <div class="content">
        <div class="table"></div>
    </div>
</main>

<?php require_once('../tpl/staff_footer.php'); ?>
<script>
    $(document).ready(function() {
        $(document).on('submit', '#searchForm', function(e)
        {
            var id = document.getElementById('ticket').value;
            var email = document.getElementById('email').value;

            if (id == '' && email == '')
            {
                alert("Search parameter cannot be empty");
                return false;
            }
            $.ajax({
                type : 'POST',
                url : '../ajax/admin_ticket_search.php',
                data : $("#searchForm").serialize(),
                dataType: 'json',
                success : function(data) {
                    if (data == false)
                    {
                        alert("No such record exists");
                        return false;
                    }
                    $("#searchResults").show();
                    $(".table").html('<div class="head"><div>TicketID</div><div>Student Name</div><div>Ticket Submission Date</div><div>Email Address</div><div>Ticket Status</div></div>');
                    insertData(data);
                }
            });
            return false;
        });
    });

    function insertData(jsonInfo)
    {
        var ticketID = document.getElementById('ticket').value;
        var email = document.getElementById('email').value;

        if (ticketID == '')
        {
            $.each(jsonInfo, function(index, element) {
                var statusType = "";
                switch (element.status) {
                    case "pending":
                        statusType = "<span class='status'>Pending</span>";
                        break;
                    case "inprogress":
                        statusType = "<span class='status pending'>In Progress</span>";
                        break;
                    case "unresolved":
                        statusType = "<span class='status closed'>Unresolved</span>";
                        break;
                    case "resolved":
                        statusType = "<span class='status resolved'>Resolved</span>";
                        break;
                }

                document.getElementById('tableTitle').innerHTML = 'Search results for: '+element.email+'';
                var content = '<div class="body"><div>'+element.ticketid+'</div><div>'+element.firstName+' '+element.lastName+'</div><div>'+formatTimestamp(element.date * 1000)+'</div><div>'+element.email+'</div><div>'+statusType+'</div></div>';
                $(content).insertAfter(".head");
            });
        }
        else
        {
            var statusType = "";
            switch (jsonInfo.status) {
                case "pending":
                    statusType = "<span class='status'>Pending</span>";
                    break;
                case "inprogress":
                    statusType = "<span class='status pending'>In Progress</span>";
                    break;
                case "unresolved":
                    statusType = "<span class='status closed'>Unresolved</span>";
                    break;
                case "resolved":
                    statusType = "<span class='status resolved'>Resolved</span>";
                    break;
            }

            document.getElementById('tableTitle').innerHTML = 'Search results for: '+jsonInfo.ticketid+'';
            var content = '<div class="body"><div>'+jsonInfo.ticketid+'</div><div>'+jsonInfo.firstName+' '+jsonInfo.lastName+'</div><div>'+formatTimestamp(jsonInfo.date * 1000)+'</div><div>'+jsonInfo.email+'</div><div>'+statusType+'</div></div>';
            $(content).insertAfter(".head");
        }
    }

</script>