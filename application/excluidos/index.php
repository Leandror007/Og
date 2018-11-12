<?php include "../corpo/corpo.php"; ?>


<script>
  function gerarScript(id){       
    window.open('script.php?id='+id, 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=50, LEFT=170, WIDTH=480, HEIGHT=380')+id;
  }
</script>
          <!-- =============================================== -->

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Sistema de OG
                <small>Registro</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li><a href="#">Fechados</a></li>
                
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

				<button class="btn btn-success pull pull-right" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">
					<span class="glyphicon glyphicon-plus-sign"></span>	Adicionar OG
				</button>

				<br /> <br /> <br />

				<table class="table" id="manageMemberTable">					
					<thead>
						<tr>
							<th>#</th>
							<th>Assunto</th>													
							<th>OG</th>
							<th>Regional</th>	
              <th>Ocorrido</th>   							
							<th>Status</th>
              <th>Ações</th>
              <th>Script</th>							
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
	        <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>	Adicionar OG</h4>
	      </div>
	      
	      <form class="form-horizontal" action="php_action/create.php" method="POST" id="createMemberForm">

	      <div class="modal-body">
	      	<div class="messages"></div>

			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="assunto" class="col-sm-2 control-label">Assunto</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Assunto">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="og" class="col-sm-2 control-label">NR OG</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="og" name="og" placeholder="Numero OG">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="notas" class="col-sm-2 control-label">Causa</label>
			    <div class="col-sm-10">
			     <textarea class="form-control" rows="3" id="notas" name="notas" placeholder="Enter ..."></textarea>
			    </div>
			  </div>

			   <div class="form-group">
			    <label for="regional" class="col-sm-2 control-label">Regional</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="regional" name="regional" placeholder="Regional">
			    </div>
			  </div>

			    <div class="form-group"> 
                    <label class="col-sm-2 control-label">Data</label>
                          <div class="col-sm-4">
                              <input type="date" class="form-control" id="dtacionamento" name="dtacionamento">
                            </div>
                             <div class="form-group"> 
                          <label class="col-sm-1 control-label">Hora</label>
                          <div class="col-sm-3">
                              <input type="time" class="form-control" id="hracionamento" name="hracionamento">
                            </div>
                        </div>
                </div>


			  <div class="form-group">
			    <label for="_status" class="col-sm-2 control-label">Status</label>
			    <div class="col-sm-5">
			      <select class="form-control" name="_status" id="_status">
			      	<option value="Aberto">Aberto</option>
			      	<option value="Fechado">Fechado</option>
			      </select>
			    </div>
			  </div>			 		

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	        <button type="submit" class="btn btn-primary">Salve Registro</button>
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
	        <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Remover OG</h4>
	      </div>
	      <div class="modal-body">
	        <p>Você deseja remover a OG ?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	        <button type="button" class="btn btn-primary" id="removeBtn">Salvar Alterações</button>
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
	        <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Encerrar OG</h4>
	      </div>

		<form class="form-horizontal" action="php_action/update.php" method="POST" id="updateMemberForm">	      

	      <div class="modal-body">
	        	
	        <div class="edit-messages"></div>

			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="editassunto" class="col-sm-2 control-label">Assunto</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="editassunto" name="editassunto" placeholder="Assunto">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="editog" class="col-sm-2 control-label">Nr Og</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="editog" name="editog" placeholder="og" readonly="readonly">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="editregional" class="col-sm-2 control-label">Regional</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="editregional" name="editregional" placeholder="Regional" readonly="readonly">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="editnotas" class="col-sm-2 control-label">Causa</label>
			    <div class="col-sm-10">
			    	 <textarea class="form-control" rows="3" id="editnotas" name="editnotas" placeholder="Causa da OG ..."></textarea>
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="editobs" class="col-sm-2 control-label">Notas</label>
			    <div class="col-sm-10">
			    	 <textarea class="form-control" rows="3" id="editobs" name="editobs" placeholder="Notas de encerramento ..."></textarea>
			    </div>
			  </div>

			   <div class="form-group">
			    <label for="editog" class="col-sm-2 control-label">Codigo</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="editcodencerramento" name="editcodencerramento" placeholder="Codigo de encerramento">
			    </div>
			  </div>

          <div class="form-group">             
            <label class="col-sm-2 control-label">Resolvido </label>
              <div class="col-sm-4">
                <input type="date" class="form-control" id="editdtfechamento" name="editdtfechamento">
              </div>
              <div class="form-group"> 
                <label class="col-sm-1 control-label">Hora</label>
              <div class="col-sm-3">
                <input type="time" class="form-control" id="edithrfechamento" name="edithrfechamento">
              </div>
              </div>
          </div>
          
			  <div class="form-group">
			    <label for="edit_status" class="col-sm-2 control-label">Status</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="edit_status" id="edit_status">
			      	<option value="Aberto">Aberto</option>
			      	<option value="Fechado">Fechado</option>
			      </select>
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






<!-- view modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="viewMemberModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-eye-open"></span> Visualizar OG</h4>
        </div>

    <form class="form-horizontal" action="#" method="POST" id="updateMemberForm">       

        <div class="modal-body">
            
          <div class="edit-messages"></div>

        <div class="form-group"> <!--/here teh addclass has-error will appear -->
          <label for="viewassunto" class="col-sm-2 control-label">Assunto</label>
          <div class="col-sm-10"> 
            <input type="text" class="form-control" id="viewassunto" name="viewassunto" placeholder="Assunto" readonly="readonly">
        <!-- here the text will apper  -->
          </div>
        </div>
        <div class="form-group">
          <label for="viewog" class="col-sm-2 control-label">Nr Og</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="viewog" name="viewog" placeholder="og" readonly="readonly">
          </div>
        </div>

        <div class="form-group">
          <label for="viewregional" class="col-sm-2 control-label">Regional</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="viewregional" name="viewregional" placeholder="Regional" readonly="readonly">
          </div>
        </div>

        <div class="form-group">
          <label for="viewnotas" class="col-sm-2 control-label">Causa</label>
          <div class="col-sm-10">
             <textarea class="form-control" rows="3" id="viewnotas" name="viewnotas" placeholder="Causa da OG ..." readonly="readonly"></textarea>
          </div>
        </div>

         <div class="form-group"> 
                    <label class="col-sm-2 control-label">Data</label>
                          <div class="col-sm-4">
                              <input type="date" class="form-control" id="viewdtacionamento" name="viewdtacionamento" readonly="readonly">
                            </div>
                             <div class="form-group"> 
                          <label class="col-sm-1 control-label">Hora</label>
                          <div class="col-sm-3">
                              <input type="time" class="form-control" id="viewhracionamento" name="viewhracionamento" readonly="readonly">
                            </div>
                        </div>
                </div>

        <div class="form-group">
          <label for="viewobs" class="col-sm-2 control-label">Notas</label>
          <div class="col-sm-10">
             <textarea class="form-control" rows="3" id="viewobs" name="viewobs" placeholder="Notas de encerramento ..." readonly="readonly"></textarea>
          </div>
        </div>

         <div class="form-group">
          <label for="viewog" class="col-sm-2 control-label">Codigo</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="viewcodencerramento" name="viewcodencerramento" placeholder="Codigo de encerramento" readonly="readonly">
          </div>
        </div>
        <div class="form-group">
          <label for="view_status" class="col-sm-2 control-label">Status</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" id="view_status" name="view_status" placeholder="og" readonly="readonly">
          </div>
        </div>

 <div class="form-group">
          <label for="view_status" class="col-sm-2 control-label">Registrado</label>
          <div class="col-sm-4">
          <input type="text" class="form-control" id="viewdataabertura" name="viewdataabertura" placeholder="og" readonly="readonly">
          </div>

          <div class="form-group">
          <label for="view_status" class="col-sm-1 control-label">Fechado</label>
          <div class="col-sm-4">
          <input type="text" class="form-control" id="viewdatafechamento" name="viewdatafechamento" placeholder="og" readonly="readonly">
          </div>
</div>  
</div>  


        </div>
        <div class="modal-footer viewMemberModal">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
         
        </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- /view modal -->





  </div><!-- /.content-wrapper -->

          <footer class="main-footer">
            <div class="pull-right hidden-xs">
              <b>Version</b> 2.3.0
            </div>
            <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
          </footer>

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
    <script src="customer.js?<?php echo time(); ?>"></script>

  </body>
  </html>
