	           		<!-- Modal -->
					<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					        <h4 class="modal-title" id="myModalLabel"><?php echo $object->firstname . " " . $object->lastname; ?></h4> 
					      </div>
					      <div class="modal-body">
						<div class="input-group">
							
							
							  <span class="input-group-addon"><i class="fa fa-user fa-fw"></i><input type="text" name="username" class="form-control" placeholder="Username" required></span>
													
							  <span class="input-group-addon"><i class="fa fa-edit fa-fw"></i><input type="password" name="password" class="form-control" placeholder="Password" required></span>
					     </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						      </div>
							</div>
						  </div>
						</div>