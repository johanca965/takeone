<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>


<div class="row">
	<div class="col-lg-6">
		<div class="box box-warning">
			<div class="box-header with-border">
				<h3 class="box-title">Awaiting for Payment Approval</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<!-- Validity Expire Warnning  -->
				<ul class="users-list clearfix">
					<?php 
					foreach ($params['suscriptions_approval'] as $suscriptions_approval) 
					{
						echo "
						<li>
							<img src='".RUTA_IMG."/users/".$suscriptions_approval['photo']."' style='width: 100px; height: 100px;' alt='".ucwords($suscriptions_approval['name'])." Image'>
							<span class='users-list-name'>".ucwords($suscriptions_approval['name'])."</span>
							<span class='users-list-name'>".$suscriptions_approval['price']." ".$params['club']['currency']."</span>
							<span class='users-list-date'>".$this->convertDate( $suscriptions_approval['created_at'] )."</span>
							<a href='#' data-toggle='modal' data-target='#modalConfirmPayment' class='open-confirm-payment ml-auto btn btn-success btn-sm' data-id='".$suscriptions_approval['id']."' title='Pay' style='margin-top: 5px;' data-url='".RUTA_URL."/Clubs/Suscription/findPackagesMembers' data-member-id='".$suscriptions_approval["member_id"]."' data-total='".$suscriptions_approval['price']."' data-currency='".$params['club']['currency']."'>
								<i class='fas fa-credit-card'></i>
							</a>
							<a href='#' data-toggle='modal' data-target='#modalConfirmCancel' class='open-confirm-cancel ml-auto btn btn-danger btn-sm' data-id='".$suscriptions_approval['id']."' style='margin-top: 5px;' title='Cancel'>
								<i class='fas fa-times'></i>
							</a>
							<form id='form-cancel-".$suscriptions_approval['id']."' action='".RUTA_URL."/Clubs/Suscription/cancel' method='POST' style='display: none;'>
							".$this->csrfToken()."
								<input type='hidden' name='id' value='".$suscriptions_approval['id']."'>
								<textarea rows='5' class='d-none observation_hidden' name='observation'></textarea>
							</form>
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
				<h3 class="box-title">Expired Subscription</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<ul class="users-list clearfix">
					<?php 
					foreach ($params['suscriptions_expired'] as $suscriptions_expired) 
					{
						echo "
						<li>
							<img src='".RUTA_IMG."/users/".$suscriptions_expired['photo']."' style='width: 100px; height: 100px;' alt='".ucwords($suscriptions_expired['name'])." Image'>
							<span class='users-list-name'>".ucwords($suscriptions_expired['name'])."</span>
							<span class='users-list-name'>".$suscriptions_expired['price']." ".$params['club']['currency']."</span>
							<span class='users-list-date'>".$this->convertDate( $suscriptions_expired['created_at'] )."</span>
							<a href='#' data-toggle='modal' data-target='#modalConfirmPayment' class='open-confirm-payment ml-auto btn btn-success btn-sm' data-id='".$suscriptions_expired['id']."' title='Pay' style='margin-top: 5px;' data-url='".RUTA_URL."/Clubs/Suscription/findPackagesMembers' data-member-id='".$suscriptions_expired["member_id"]."' data-total='".$suscriptions_expired['price']."' data-currency='".$params['club']['currency']."'>
								<i class='fas fa-credit-card'></i>
							</a>
							<a href='#' data-toggle='modal' data-target='#modalConfirmCancel' class='open-confirm-cancel ml-auto btn btn-danger btn-sm' data-id='".$suscriptions_expired['id']."' style='margin-top: 5px;' title='Cancel'>
								<i class='fas fa-times'></i>
							</a>
							<form id='form-cancel-".$suscriptions_expired['id']."' action='".RUTA_URL."/Clubs/Suscription/cancel' method='POST' style='display: none;'>
							".$this->csrfToken()."
								<input type='hidden' name='id' value='".$suscriptions_expired['id']."'>
								<textarea rows='5' class='d-none observation_hidden' name='observation'></textarea>
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


<div class="modal fade" id="modalConfirmPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm modal-notify" role="document">
		<!--Content-->
		<div class="modal-content text-center">
			<form id="form-payment" method="post" action="<?php echo RUTA_URL; ?>/Clubs/Suscription/payment" autcomplete="off">
				<?php echo $this->csrfToken(); ?>
				<!--Header-->
				<div class="modal-header bg-danger d-flex justify-content-center">
					<p class="heading">Are you sure the suscription was paid?</p>
				</div>

				<!--Body-->
				<div class="modal-body">
					<i class="fa fa-credit-card fa-4x animated rotateIn"></i>
					<div id="list-package" style="margin-top: 15px;"></div>
					<div id="errors-payment" style="margin-top: 15px;"></div>
				</div>

				<!--Footer-->
				<div class="modal-footer flex-center">
					<input type="hidden" id="id-form-payment" name="id">
					<button type="submit" id="btn-form-payment" class="form-payment btn btn-primary">Yes</button>
					<a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
				</div>
			</form>
		</div>
		<!--/.Content-->
	</div>
</div>


<div class="modal fade" id="modalConfirmCancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm modal-notify" role="document">
		<!--Content-->
		<div class="modal-content text-center">
			<!--Header-->
			<div class="modal-header bg-danger d-flex justify-content-center">
				<p class="heading">Are you sure you want to cancel the suscription?</p>
			</div>

			<!--Body-->
			<div class="modal-body">

				<i class="fa fa-times fa-4x animated rotateIn"></i>

				<div id="errors-cancel" style="margin-top: 15px;"></div>

				<textarea rows="5" class="form-control" id="observation-form-cancel" name="observation-form-cancel" placeholder="observation" autofocus style="resize: none;"></textarea>
			</div>

			<!--Footer-->
			<div class="modal-footer flex-center">
				<input type="hidden" id="id-form-cancel" name="id-form-cancel">
				<a id="btn-form-cancel" class="form-cancel btn btn-primary">Yes</a>
				<a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
			</div>
		</div>
		<!--/.Content-->
	</div>
</div>


<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/footer.php";
?>
<script type="text/javascript" src="<?php echo RUTA_JS; ?>/clubs/suscriptions.js"></script>