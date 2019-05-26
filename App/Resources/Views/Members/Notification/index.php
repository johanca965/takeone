<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>


<div class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Notifications</h3>
				</div>
				<div class="box-body">
					<div class="row content-notifications">
						<div class="col-xs-12 col-md-5">
							<ul>
								<?php 
									if ( $params['notifications']->num_rows > 0 ) 
									{
										foreach ($params['notifications'] as $notifcation) 
										{
											$readed = '';
											if( $notifcation['readed'] == '2' )
												$readed = '<i class="fa fa-check-circle text-grey" title="Readed"></i>';
											echo '
												<li>
													<a href="'.RUTA_URL.'/General/Notification/usernotificationlist/'.$notifcation['id'].'">
														<div class="pull-left">
															<img src="'.RUTA_IMG.'/clubs/'.$notifcation['slug'].'/'.$notifcation['logo'].'" class="img-circle" alt="User Image">
							                            </div>
							                            <h4>
							                            	'.ucwords( $notifcation['title'] ).'
							                            	'.$readed.'
							                            	<small>
							                            		<i class="fa fa-clock"></i> '.$this->convertDate( $notifcation['updated_at'] ).'
							                            		</small>
							                           	</h4>
													</a>
												</li>
											';
										}
									}
									else
									{

									}
								?>
							</ul>
						</div>
						<div class="col-xs-12 col-md-7">
							<?php 
								if( isset( $params['notification_find']['id'] ) )
								{
									$readed = '';
									if( $params['notification_find']['readed'] == '2' )
										$readed = '<i class="fa fa-check-circle text-grey" title="Readed"></i>';
									echo '
										<div>
											<img src="'.RUTA_IMG.'/clubs/'.$params['notification_find']['slug'].'/'.$params['notification_find']['logo'].'" class="img-circle" alt="User Image">
								            <h4>
								            	'.ucwords( $params['notification_find']['title'] ).'
								                '.$readed.'
								                <small>
								                	<i class="fa fa-clock"></i> '.$this->convertDateComplete( $params['notification_find']['updated_at'] ).'
								                </small>
								            </h4>
							            </div>
							            <p>'.ucfirst( $params['notification_find']['message'] ).'</p>
							        ';
								}
								else
								{
							?>

									<h3 style="text-align: center;">
										<i style="display: block; margin-bottom: 10px;" class="fa fa-bell fa-3x"></i>
										Select a notification to read
									</h3>
							<?php 
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/footer.php";
?>