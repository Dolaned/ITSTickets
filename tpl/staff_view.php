<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>
	.glyphicon {
		font-size: 70px;
		float: right;
		margin-top: -70px;
		margin-right: 20px;
	}
	.form-control{
		font-size:1.3em;
		height:2.5em;
	}
</style>

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
        <h4>You are about to delete this ticket.</h4>
        <h4>It cannot be restored at a later time. Continue?</h4><span class="glyphicon glyphicon-warning-sign"></span>
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
  <div class="modal-dialog modal-lg">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title modal-title-comment"></h2>
		<p class="commentParas"></p>
		<p class="commentParas"></p>
      </div>
      <div class="modal-body modal-body-comment">
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
		$.getJSON("../ajax/admin_view_tickets_load.php", function(result){	
			$.each(result, function(id, obj) {
				var container = "<div class='body'><div>"+obj.id+"</div><div>"+obj.email+"</div><div>"+obj.date+"</div><div><span class='status pending'>"+obj.status+"</span></div><div><a class='btn btn-info' onclick='displayStatusModal("+obj.id+")'>Change Status</a><a class='btn btn-red' data-toggle='modal' data-target='#deleteModal' onclick='hiddenID("+obj.id+")'>Delete</a><a class='btn btn-green addComment' data-toggle='modal' data-target='#commentModal' onclick='commentTicket("+obj.id+")'>Add Comment</a></div></div>";
				$(container).insertAfter("main .head");
			});
        });
	});
	
	/********************* Code for deleting ticket ************************/
	
	//Sneaky way to pass the id of the ticket to delete
	function hiddenID(id)
	{
		content = '<p id="hiddenDeleteModalId" style="display:none;">'+id+'</p>';
		$(".modal-footer-delete").append(content);
	}
	
	function deleteTicket()
	{
		id = document.getElementById('hiddenDeleteModalId').innerHTML;
		
		$.ajax({
			type:'post',
			url:"../ajax/admin_view_ticket_delete.php",
			data: {"id":id}, 
			success: function(data) {
				console.log('success',data);				
			},
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
		id = document.getElementById('hiddenStatusModalPara').innerHTML;
		
		$.ajax({
			type:'post',
			url:"../ajax/admin_view_ticket_status_update.php",
			data: {"id":id, "status":status}, 
			dataType: 'json',
			success: function(data) {
				console.log('success',data);
				$(".modal-footer-status").append("<p id='changeSuccess' style='margin-left:20px;'>Ticket status successfully changed</p>");
			},
		}); 
	}
	
	/********************* Code for add comment **************************/
	
	function commentTicket(id)
	{
		content = '<p id="hiddenCommentModalId" style="display:none;">'+id+'</p>';
		$(".modal-footer-comment").append(content);
		
		$.ajax({
			type:'post',
			url:"../ajax/view_ticket_load.php",
			data: {"id":id}, 
			dataType: 'json',
			success: function(data) {
				console.log('success',data);
				/*Code for showing additional information on the add comment modal/popup*/
			},
		}); 
		
		$("commentModal").modal();
	}
	
	function addComment()
	{
		id = document.getElementById('hiddenCommentModalId').innerHTML;
		
		$.ajax({
			type:'post',
			url:"../ajax/admin_view_ticket_create_comment.php",
			data: {"id":id, "name":name, "text":comment}, 
			dataType: 'json',
			success: function(data) {
				console.log('success',data);
				$(".modal-footer-comment").append("<p id='commentSuccess' style='margin-left:20px;'>Comment successfully added</p>");
			},
		}); 
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

