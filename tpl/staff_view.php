<link rel="stylesheet" href="/bootstrap.min.css">

<main>
    <h1 class="page-title">View Tickets</h1>
    <div class="content">
        <div class="table"></div>
    </div>
</main>

<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">Delete Confirmation</h2>
      </div>
      <div class="modal-body">
        <p>
			<span class="material-icons" style="float:right;">warning</span>
			You are about to delete this ticket.</p>
        <p>It cannot be restored at a later time. Continue?</p>
      </div>
      <div class="modal-footer modal-footer-delete">
		<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="deleteTicket()">Yes</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div>


<div id="statusChangeModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">Status</h2>
      </div>
      <div class="modal-body modal-body-status">
		<select class="form-control" onchange="statusChanged(this.value)">
			<option selected disabled>Select a status</option>
			<option value="pending">Pending</option>
			<option value="inprogress">In Progress</option>
			<option value="unresolved">Unresolved</option>
			<option value="resolved">Resolved</option>
		</select>
	  </div>
      <div class="modal-footer modal-footer-status">
      </div>
    </div>

  </div>
</div>


<div id="commentModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title modal-title-comment">Reply to this conversation</h2>
		<p class="commentParas"></p>
		<p class="commentParas"></p>
      </div>
      <div class="modal-body modal-body-comment">
	  	<input type="text" placeholder="Reply as... (name)" id="commentName" /><hr/>
		<textarea placeholder="Type a reply here..." id="commentTxt" style="max-width:100%;min-height:150px;" name="commentTxt"></textarea>
	  </div>
      <div class="modal-footer modal-footer-comment">
		<a class='btn btn-green' onclick='addComment()'>Send message</a>
      </div>
    </div>

  </div>
</div>


<?php require_once('../tpl/staff_footer.php'); ?>

<script>
	
	//Ticket information loaded from database and displayed as rows
	$(document).ready(function(){
		grabAll();
	});

	function grabAll() {
		$('.table').html('<div class="head"><div>Ticket ID</div><div>Name</div><div>Email Address</div><div>Submission Date</div><div>Status</div><div>Actions</div></div>');
		$.getJSON("../ajax/admin_view_tickets_load.php", function(result){
			if(Object.keys(result).length > 0) {
				$.each(result, function (id, obj) {
					var statusType = "";
					switch (obj.status) {
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

					var container = "<div class='body'><div>" + obj.ticketid + "</div><div>" + obj.firstName + " " + obj.lastName + "</div><div>" + obj.email + "</div><div>" + formatTimestamp(obj.date * 1000) + "</div><div>" + statusType + "</div><div><a class='btn btn-info tt' title='Change Ticket Status' onclick='displayStatusModal(\"" + obj.ticketid + "\")'><span class='material-icons'>mode_edit</span></a><a class='btn btn-red tt' title='Delete Ticket' data-toggle='modal' data-target='#deleteModal' onclick='hiddenID(\"" + obj.ticketid + "\")'><span class='material-icons'>delete</span></a><a class='btn btn-green addComment tt' title='Add Comment to Ticket' data-toggle='modal' data-target='#commentModal' onclick='commentTicket(\"" + obj.ticketid + "\")'><span class='material-icons'>comment</span></a><a class='btn viewPage tt' title='View Ticket on site' onclick='viewPage(\"" + obj.ticketid + "\")'><span class='material-icons'>find_in_page</span></a></div></div>";
					$(container).insertAfter("main .head");

					$('.tt').tooltip();
				});
			}
			else {
				$('<div class="body"><div>No results were found</div></div>').insertAfter("main .head");
			}
		});
	}
	
	/********************* Code for deleting ticket ************************/
	
	//Sneaky way to pass the id of the ticket to delete
	function hiddenID(id)
	{
		var content = '<p id="hiddenDeleteModalId" style="display:none;">'+id+'</p>';
		$(".modal-footer-delete").append(content);
	}
	
	function deleteTicket()
	{
		var id = document.getElementById('hiddenDeleteModalId').innerText;
		
		$.ajax({
			type:'post',
			url:"../ajax/admin_view_ticket_delete.php",
			data: {id:id},
			success: function(data) {
				console.log('success',data);
				grabAll();
			}
		}); 
	}
	
	/*********************** Code for change status *******************************/
	
	function displayStatusModal(id)
	{
		var hiddenContent = '<p id="hiddenStatusModalPara" style="display:none;">'+id+'</p>';
		$(hiddenContent).insertAfter(".modal-footer-status");
		
		$('#changeSuccess').remove();
		
		$("#statusChangeModal").modal();
	}
	
	function statusChanged(status)
	{
		var id = document.getElementById('hiddenStatusModalPara').innerText;
		
		$.ajax({
			type:'post',
			url:"../ajax/admin_view_ticket_status_update.php",
			data: {"id":id, "status":status}, 
			dataType: 'json',
			success: function(data) {
				console.log('success',data);
				$(".modal-footer-status").html("<p id='changeSuccess' style='margin-left:20px;'>Ticket status successfully changed</p>");
				grabAll();
			},
		}); 
	}
	
	/********************* Code for add comment **************************/
	
	function commentTicket(id)
	{
		var content = '<p id="hiddenCommentModalId" style="display:none;">'+id+'</p>';
		$(".modal-footer-comment").append(content);
		
	}
	
	function addComment()
	{
		var id = document.getElementById('hiddenCommentModalId').innerText;

		var name = $("#commentName").val();
		var comment = $("#commentTxt").val();
		
		$.ajax({
			type:'post',
			url:"../ajax/admin_view_ticket_create_comment.php",
			data: {id:id, name:name, text:comment},
			dataType: 'json',
			success: function(data) {
				console.log('success',data);
				$(".modal-footer-comment").html("<p id='commentSuccess' style='margin-left:20px;'>Comment successfully added</p>");
			},
		}); 
	}

	function viewPage(id) {
		window.open('../?page=view#'+id, '_blank');
	}
	
	//Centers a modal on the screen
	var modalVerticalCenterClass = ".modal";
	function centerModals($element) {
		var $modals;
		if ($element.length) {
			$modals = $element;
		} else {
			$modals = $(modalVerticalCenterClass + ':visible');
		}
		$modals.each( function(i) {
			var $clone = $(this).clone().css('display', 'block').appendTo('body');
			var top = Math.round(($clone.height() - $clone.find('.modal-content').height()) / 2);
			top = top > 0 ? top : 0;
			$clone.remove();
			$(this).find('.modal-content').css("margin-top", top);
		});
	}
	$(modalVerticalCenterClass).on('show.bs.modal', function(e) {
		centerModals($(this));
	});
	$(window).on('resize', centerModals);

</script>

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>