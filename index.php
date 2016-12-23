<?php
require_once "config.php";
require_once "actions.php";
$rows = getRows();		
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Test</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js
	"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script>
		function load(id){
			var item = $(".item-"+id);
			$("#fname").val($(".fname", item).text());
			$("#sname").val($(".sname", item).text());
			$("#email").val($(".email", item).text());
			$("#id").val(id);
			$("#op").val("update");
		}
		$(document).ready(function(){

			$("#person-form").submit(function(){
				if ($("#person-form").valid()) {
					$('#myModal').modal('hide');
					return true;
				};
				return false;
			})
			$(".save-btn").click(function(){
				$("#person-form").trigger("submit");
			});
			$("#person-form").validate();
			$(".btn-add").click(function(){
				
				$("#person-form").trigger("reset");
				$("#op").val("create");
				$('#myModal').modal('show');
			});
			$(".btn-update").click(function(){
				load($(this).data("id"));
				$('#myModal').modal('show');
				return false;
			})

		});
		

	</script>
	<div class="container">
		<h2>Test</h2>
	
		<table class="table table-bordered">
			<thead>
				<tr>	
					<th>First name</th>
					<th>Second name</th>
					<th>E-mail</th>
					<th>Edit</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($rows as $row): ?>
				<tr class="item item-<?= $row->id ?>">					
					<td class="fname" ><?= $row->fname; ?></td>
					<td class="sname"><?= $row->sname; ?></td>
					<td class="email"><?= $row->email; ?></td>
					<td>

					<a href="/actions.php?op=delete&id=<?= $row->id ?>" class="btn-remove">Remove</a> 
					<a class="btn-update" href="#" data-id=<?= $row->id ?> >Edit</a></td>						
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		
	
	<button type="button" class="btn btn-info btn-add" data-toggle="modal">Add</button>

	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Modal Header</h4>
				</div>
				<div class="modal-body">
					<form id="person-form" action="actions.php">
						<div class="form-group">
							<label for="fname">Name:</label>
							<input type="fname" class="form-control" id="fname" name="fname" required />
						</div>
						<div class="form-group">
							<label for="sname">SName:</label>
							<input type="sname" class="form-control" id="sname"  name="sname"  required />
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<input type="email" class="form-control" id="email"  name="email"  required />
							<input type='hidden' name="id" id="id" />
							<input type='hidden' name="op" id="op" />
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-default btn-primary save-btn" >Save</button>
				</div>
			</div>

		</div>
	</div>
</body>
</html>
