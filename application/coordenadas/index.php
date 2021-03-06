<?php include "../corpo/corpo.php"; ?>


<?php  if($_SESSION['nivel'] == 'Sup') { ?>
          <!-- =============================================== -->

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Cadastro de
                <small>Coordenadas</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li><a href="#">Abertos</a></li>
                
              </ol>
            </section>

            <!-- ========================================================================================================== -->
            <!-- Main content -->

	  <section class="content">
              <!-- Default box -->
              <div class="box">
                <div class="box-body">
			<div class="col-md-12">	

				<div class="removeMessages"></div>

				<button class="btn btn-default pull pull-right" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">
					<span class="glyphicon glyphicon-plus-sign"></span>	Adicionar Coordenadas
				</button>

				<br /> <br /> <br />

				<table class="table" id="manageMemberTable">					
					<thead>
						<tr class="success">
									<th>no</th>
									<th>Regiao</th>													
									<th>Latitude X</th>
									<th>Longitude Y</th>								
									<th>Regiao</th>
									<th>Opções</th>
								</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

	<!-- add modal -->
			<div class="modal fade" tabindex="-1" role="dialog" id="addMember">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>	Adicionar Região</h4>
						</div>
						
						<form class="form-horizontal" action="php_action/create.php" method="POST" id="createMemberForm">

							<div class="modal-body">
								<div class="messages"></div>

								<div class="form-group"> <!--/here teh addclass has-error will appear -->
									<label for="regiao" class="col-sm-2 control-label">Regional</label>
									<div class="col-sm-10"> 
										<input type="text" class="form-control" id="regiao" name="regiao" maxlength="5" placeholder="Regional">
										<!-- here the text will apper  -->
									</div>
								</div>
								<div class="form-group">
									<label for="latitude_x" class="col-sm-2 control-label">Latitude x</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="latitude_x" name="latitude_x" placeholder="latitude_x">
									</div>
								</div>
								<div class="form-group">
									<label for="longitude_y" class="col-sm-2 control-label">Longitude y</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="longitude_y" name="longitude_y" placeholder="Longitude_y">
									</div>
								</div>

                <div class="form-group">
                  <label for="cidade" class="col-sm-2 control-label">Cidade</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade">
                  </div>
                </div>
															 		

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
								<button type="submit" class="btn btn-primary">Adicionar</button>
							</div>
						</form> 
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!-- /add modal -->

			<!-- remove modal -->
			<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Remover Cidade</h4>
						</div>
						<div class="modal-body">
							<p>Você deseja excluir o Agente?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
							<button type="button" class="btn btn-primary" id="removeBtn">Remover</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!-- /remove modal -->

			<!-- edit modal -->
			<div class="modal fade" tabindex="-1" role="dialog" id="editMemberModal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Edita Regiao</h4>
						</div>

						<form class="form-horizontal" action="php_action/update.php" method="POST" id="updateMemberForm">	      

							<div class="modal-body">
								
								<div class="edit-messages"></div>

								<div class="form-group"> <!--/here teh addclass has-error will appear -->
									<label for="editregiao" class="col-sm-2 control-label">Regional</label>
									<div class="col-sm-10"> 
										<input type="text" class="form-control" id="editregiao" maxlength="5" name="editregiao" placeholder="Nome">
										<!-- here the text will apper  -->
									</div>
								</div>
								<div class="form-group">
									<label for="editlatitude_x" class="col-sm-2 control-label">Latitude x</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="editlatitude_x" name="editlatitude_x" placeholder="latitude_x">
									</div>
								</div>
								<div class="form-group">
									<label for="editlongitude_y" class="col-sm-2 control-label">Longitude y</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="editlongitude_y" name="editlongitude_y" placeholder="Longitude_y">
									</div>
								</div>
								<div class="form-group">
                  <label for="editcidade" class="col-sm-2 control-label">Cidade</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="editcidade" name="editcidade" placeholder="Cidade">
                  </div>
                </div>
								
							</div>
							<div class="modal-footer editMemberModal">
								<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
								<button type="submit" class="btn btn-primary">Salvar Mudanças</button>
							</div>
						</form>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!-- /edit modal -->

  </div><!-- /.content-wrapper -->

      
          <!-- Control Sidebar -->
          <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
              <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

              <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <!-- Home tab content -->
              <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                  <li>
                    <a href="javascript::;">
                      <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                      <div class="menu-info">
                        <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                        <p>Will be 23 on April 24th</p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript::;">
                      <i class="menu-icon fa fa-user bg-yellow"></i>
                      <div class="menu-info">
                        <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                        <p>New phone +1(800)555-1234</p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript::;">
                      <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                      <div class="menu-info">
                        <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                        <p>nora@example.com</p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript::;">
                      <i class="menu-icon fa fa-file-code-o bg-green"></i>
                      <div class="menu-info">
                        <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                        <p>Execution time 5 seconds</p>
                      </div>
                    </a>
                  </li>
                </ul><!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                  <li>
                    <a href="javascript::;">
                      <h4 class="control-sidebar-subheading">
                        Custom Template Design
                        <span class="label label-danger pull-right">70%</span>
                      </h4>
                      <div class="progress progress-xxs">
                        <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript::;">
                      <h4 class="control-sidebar-subheading">
                        Update Resume
                        <span class="label label-success pull-right">95%</span>
                      </h4>
                      <div class="progress progress-xxs">
                        <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript::;">
                      <h4 class="control-sidebar-subheading">
                        Laravel Integration
                        <span class="label label-warning pull-right">50%</span>
                      </h4>
                      <div class="progress progress-xxs">
                        <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript::;">
                      <h4 class="control-sidebar-subheading">
                        Back End Framework
                        <span class="label label-primary pull-right">68%</span>
                      </h4>
                      <div class="progress progress-xxs">
                        <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                      </div>
                    </a>
                  </li>
                </ul><!-- /.control-sidebar-menu -->

              </div><!-- /.tab-pane -->
              <!-- Stats tab content -->
              <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
              <!-- Settings tab content -->
              <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                  <h3 class="control-sidebar-heading">General Settings</h3>
                  <div class="form-group">
                    <label class="control-sidebar-subheading">
                      Report panel usage
                      <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                      Some information about this general settings option
                    </p>
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label class="control-sidebar-subheading">
                      Allow mail redirect
                      <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                      Other sets of options are available
                    </p>
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label class="control-sidebar-subheading">
                      Expose author name in posts
                      <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                      Allow the user to show his name in blog posts
                    </p>
                  </div><!-- /.form-group -->

                  <h3 class="control-sidebar-heading">Chat Settings</h3>

                  <div class="form-group">
                    <label class="control-sidebar-subheading">
                      Show me as online
                      <input type="checkbox" class="pull-right" checked>
                    </label>
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label class="control-sidebar-subheading">
                      Turn off notifications
                      <input type="checkbox" class="pull-right">
                    </label>
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label class="control-sidebar-subheading">
                      Delete chat history
                      <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                  </div><!-- /.form-group -->
                </form>
              </div><!-- /.tab-pane -->
            </div>
          </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

<?php  }else{ echo "<script>window.setTimeout('history.back(-2)', 5);</script> ";}  ?>

	<!-- jquery plugin -->
	<script type="text/javascript" src="assests/jquery/jquery.min.js"></script>
	<!-- bootstrap js -->
	

	<!-- include custom index.js -->
	<script type="text/javascript" src="custom/js/index.js?<?php echo time(); ?>"></script>



    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>

    <!-- SweetAlert -->
    <script src="../../plugins/sweetalert/sweetalert.min.js"></script>
    <!-- Bootstrap-notify -->
    <script src="../../plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="../../plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>





</body>
</html>