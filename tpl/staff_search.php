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
                        <option value="9" selected>Ticket Status</option>
                        <option value="10">Date</option>
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

<main>
    <h1 class="page-title" id="tableTitle"></h1>
    <div class="content">
        <div class="table">
            <div class="head">
                <div>TicketID</div>
                <div>Student Name</div>
                <div>Ticket Submission Date</div>
                <div>Email Address</div>
                <div>Ticket Status</div>
            </div>
        </div>
    </div>
</main>

<?php require_once('../tpl/staff_footer.php'); ?>
<script>
	$(document).ready(function() {
        $("#searchForm").validate({
            rules: {
                id: {
                    //digits: true,
                    nowhitespace: true
                },
                email: {
                    email: true
                },
            },
        });
    });

    $(document).ready(function() {
        $(document).on('submit', '#searchForm', function(e)
        {
			id = document.getElementById('ticket').value;
			email = document.getElementById('email').value;
			
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
				document.getElementById('tableTitle').innerHTML = 'Search results for: '+element.email+'';
				var content = '<div class="body"><div>'+element.ticketid+'</div><div>'+element.firstName+' '+element.lastName+'</div><div>'+element.date+'</div><div>'+element.email+'</div><div>'+element.status+'</div></div>';
				$(content).insertAfter(".head");		
			});
		}
		else
		{
			document.getElementById('tableTitle').innerHTML = 'Search results for: '+jsonInfo.ticketid+'';
			var content = '<div class="body"><div>'+jsonInfo.ticketid+'</div><div>'+jsonInfo.firstName+' '+jsonInfo.lastName+'</div><div>'+jsonInfo.date+'</div><div>'+jsonInfo.email+'</div><div>'+jsonInfo.status+'</div></div>';
			$(content).insertAfter(".head");
		}
	}
	
</script>