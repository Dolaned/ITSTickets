<main>
    <h1 class="page-title">Ticket Search</h1>
    <div class="content">
        <form role="form" id="searchForm">
            <label for="ticket">Search by Ticket ID:</label>
            <input id="ticketID" name="ticketID" type="text" placeholder="Ticket ID" />
            <hr />

            <label for="email">Search by Email Address:</label>
            <input id="email" name="email" type="email" placeholder="Email Address" />
            <hr />
            <p>
                Sorting options will go here
            </p>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium atque et harum impedit natus, nostrum obcaecati quia quisquam similique soluta! Aperiam blanditiis, corporis distinctio impedit perferendis quasi reiciendis repudiandae sunt!
            </p>
            <input type="submit" value="Search" class="btn" />
        </form>
    </div>
</main>

<main>
    <h1 class="page-title">Search results for: Nothing</h1>
    <div class="content content2">
        <div class="table">
            <div class="head">
                <div>Student</div>
                <div>Email Address</div>
            </div>
            <div class="body">
                <div>Ayyy</div>
                <div>Ayyy</div>
            </div>
            <div class="body">
                <div>Ayy boi</div>
                <div>Here come dat boi</div>
            </div>
            <div class="body">
                <div>Ayy boi</div>
                <div>Here come dat boi</div>
            </div>
            <div class="body">
                <div>Ayy boi</div>
                <div>Here come dat boi</div>
            </div>
            <div class="body">
                <div>Ayy boi</div>
                <div>Here come dat boi</div>
            </div>
        </div>
    </div>
</main>

<?php require_once('../tpl/staff_footer.php'); ?>

<script>

	$(document).on('submit', '#searchForm', function()
	{
		//var data = $(this).serialize();
		ticket = document.getElementById("ticketID").innerHTML;
		$.ajax({
			type : 'POST',
			url  : '../ajax/ticket_search.php',
			data : ticket,
			success :  function(data)
			{
				$('#searchForm').trigger("reset");
				if(data != "error") {
					// redirect to new ticket
					console.log(data);
				}
				else {
					// Get rid of the block of code below if you don't want the form to disappear after ticket submission and
					// uncomment the block below this
					$("#searchForm").fadeOut(250).hide(function()
					{
						$("#searchForm").fadeIn(250).show(function()
						{
							$(".content2").html('<p>An error occurred. Please try again.</p>');
						});
					});
				}
			}
		});
		return false;
	});

</script>
