<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>

<div class="row">
	<div class="col-lg-6">
		<div class="box box-warning">
			<div class="box-header with-border">
				<h3 class="box-title">Approved</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<!-- Validity Expire Warnning  -->
				<ul class="users-list clearfix">
					<?php 
					foreach ($params['clubs_approved'] as $clubs_approved) 
					{
						echo "
						<li>
							<img src='".RUTA_IMG."/clubs/".$clubs_approved['slug']."/".$clubs_approved['logo']."' style='width: 100px; height: 100px;' alt='".ucwords($clubs_approved['title'])." Image'>
							<span class='users-list-date'>".ucwords($clubs_approved['title'])."</span>
							<span class='users-list-date'>Owner: ".ucwords($clubs_approved['owner'])."</span>
							<span class='users-list-date'>Country: ".ucwords($clubs_approved['country'])."</span>
							<span class='users-list-date'>".$this->convertDate( $clubs_approved['created_at'] )."</span>
							</span>
						</li>
						";
					}
					?>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">Awaiting for Approval</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<!-- Validity Expire Warnning  -->
				<ul class="users-list clearfix">
					<?php 
					foreach ($params['clubs_waiting'] as $clubs_waiting) 
					{
						echo "
						<li>
							<img src='".RUTA_IMG."/clubs/".$clubs_waiting['slug']."/".$clubs_waiting['logo']."' style='width: 100px; height: 100px;' alt='".ucwords($clubs_waiting['title'])." Image'>
							<span class='users-list-date'>".ucwords($clubs_waiting['title'])."</span>
							<span class='users-list-date'>Owner: ".ucwords($clubs_waiting['owner'])."</span>
							<span class='users-list-date'>Country: ".ucwords($clubs_waiting['country'])."</span>
							<span class='users-list-date'>".$this->convertDate( $clubs_waiting['created_at'] )."</span>
							</span>
							<a href='#' data-toggle='modal' data-target='#modalConfirmApproved' class='open-confirm-approved ml-auto btn btn-success btn-sm' data-id='".$clubs_waiting['id']."' title='Approve' style='margin-top: 5px;'>
								<i class='fas fa-check-circle' style='margin-right: 5px;'></i> Approve
							</a>
							<form id='form-approved-".$clubs_waiting['id']."' action='".RUTA_URL."/Administrators/Welcome/approved' method='POST' style='display: none;'>
								".$this->csrfToken()."
								<input type='hidden' name='id' value='".$clubs_waiting['id']."'>
							</form>
						</li>
						";
					}
					?>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalConfirmApproved" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm modal-notify" role="document">
		<!--Content-->
		<div class="modal-content text-center">
			<!--Header-->
			<div class="modal-header bg-danger d-flex justify-content-center">
				<p class="heading">Are you sure to approve the club?</p>
			</div>

			<!--Body-->
			<div class="modal-body">

				<i class="fa fa-times fa-4x animated rotateIn"></i>
				
				<div id="errors-approved"></div>
			</div>

			<!--Footer-->
			<div class="modal-footer flex-center">
				<input type="hidden" id="id-form-approved" name="id-form-approved">
				<a id="btn-form-approved" class="form-approved btn btn-primary">Yes</a>
				<a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
			</div>
		</div>
		<!--/.Content-->
	</div>
</div>

<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/footer.php";
?>
<script type="text/javascript">
	$(document).ready(function() {
		$(".open-confirm-approved").click(function()
		{
			$("#id-form-approved").val( $(this).data('id') );
			$(".form-approved").data( "id", $(this).data('id') );
		});


		$(".form-approved").click(function(){
			$("#errors-approved").html('');
			var id = $(this).data('id');
			var form = $("#form-approved-"+id);
			var url = form.attr('action');
			$.ajax({
				url: url,
				type: 'POST',
				data: form.serialize(),
				beforeSend: function() {
					toastr.info("Approving club...");
				},
				success: function(data) {
					if( data === 'true' )
					{
						toastr.success("Club approved.");
						location.reload();
					}else
					{
						toastr.error("Ha ocurrido un error.");
						$("#errors-approved").append( data );
					}
				},
				error: function(xhr) {
					toastr.error("Ha ocurrido un error.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
			return false;
		});
	});
</script>