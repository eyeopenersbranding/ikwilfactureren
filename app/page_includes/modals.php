<!-- Persoon verwijderen -->
	<div class="modal fade" id="modal-default" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title pull-left"><i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Waarschuwing</h5>
				</div>
				<div class="modal-body">
					<div class="alert alert-danger" role="alert">
						<strong>Let op,</strong> bij het verwijderen van een persoon worden ook alle gekoppelde bedrijven, facturen, bestanden en offertes permanent verwijderd.
					</div>
					Wanneer dit persoon niet langer contactpersoon meer is van het
					gekoppelde bedrijf kunt u deze klantkaart omzetten naar een ander persoon.
				</div>
				<div class="modal-footer">
					 <form action='IKWIL_Engine/IKWILDelete_functions.php' method='post' enctype='multipart/form-data'>
						<input type="hidden" name="person_id" value="<?php echo "$person_id" ?>" />
						<input type="hidden" name="company_id" value="<?php echo "$company_id" ?>" />
						<button type="button" class="btn btn-link" data-dismiss="modal">Annuleren</button>
						<button type="submit" name="delete_person" class="btn btn-danger"> Verwijderen</button>
					  </form>
				</div>
			</div>
		</div>
	</div>

<!-- Bedrijfverwijderen -->
	<div class="modal fade" id="modal-company" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title pull-left"><i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Waarschuwing</h5>
				</div>
				<div class="modal-body">
					<div class="alert alert-danger" role="alert">
						<strong>Let op,</strong> bij het verwijderen van een bedrijf worden ook alle gekoppelde facturen, bestanden en offertes permanent verwijderd.
					</div>
				</div>
				<div class="modal-footer">
					 <form action='IKWIL_Engine/IKWILDelete_functions.php' method='post' enctype='multipart/form-data'>
						<input type="hidden" name="company_id" value="<?php echo "$company_id" ?>" />
						<button type="button" class="btn btn-link" data-dismiss="modal">Annuleren</button>
						<button type="submit" name="delete_company" class="btn btn-danger"> Verwijderen</button>
					  </form>
				</div>
			</div>
		</div>
	</div>

<!-- Factuur verwijderen -->
	<div class="modal fade" id="modal-delete-invoice" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title pull-left"><i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Waarschuwing</h5>
				</div>
				<div class="modal-body">
					<div class="alert alert-danger" role="alert">
						<strong>Let op,</strong> Weet u zeker dat u deze factuur wilt verwijderen?.
					</div>
				</div>
				<div class="modal-footer">
					 <form action='IKWIL_Engine/IKWILDelete_functions.php' method='post' enctype='multipart/form-data'>
						<input type="hidden" name="invoice_id" value="<?php echo "$invoice_id" ?>" />
						<button type="button" class="btn btn-link" data-dismiss="modal">Annuleren</button>
						<button type="submit" name="delete_invoice" class="btn btn-danger"> Verwijderen</button>
					  </form>
				</div>
			</div>
		</div>
	</div>

<!-- Account verwijderen -->
	<div class="modal fade" id="modal-delete-account" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title pull-left"><i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Waarschuwing</h5>
				</div>
				<div class="modal-body">
					<div class="alert alert-danger" role="alert">
						<strong>Let op,</strong> Weet u zeker dat u dit account wilt verwijderen.
					</div>
				</div>
				<div class="modal-footer">
					 <form action='IKWIL_Engine/IKWILDelete_functions.php' method='post' enctype='multipart/form-data'>
						<input type="hidden" name="account_id" value="<?php echo "$account_id" ?>" />
						<button type="button" class="btn btn-link" data-dismiss="modal">Annuleren</button>
						<button type="submit" name="delete_account" class="btn btn-danger"> Verwijderen</button>
					  </form>
				</div>
			</div>
		</div>
	</div>

<!-- Bijlage verwijderen -->
	<div class="modal fade" id="modal-delete-attachment" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title pull-left"><i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Waarschuwing</h5>
				</div>
				<div class="modal-body">
					<div class="alert alert-danger" role="alert">
						<strong>Let op,</strong> Weet u zeker dat u dit project wilt verwijderen?
					</div>
					Gegevens kunt u op een later moment niet meer herstellen!
				</div>
				<div class="modal-footer">
					 <form action='IKWIL_Engine/IKWILDelete_functions.php' method='post' enctype='multipart/form-data'>
						<input type="hidden" name="project_id" value="<?php echo "$project_id" ?>" />
						<input type="hidden" name="attachment_file" value="<?php echo "$attachment_file" ?>" />
						<button type="button" class="btn btn-link" data-dismiss="modal">Annuleren</button>
						<button type="submit" name="delete_project" class="btn btn-danger"> Verwijderen</button>
					  </form>
				</div>
			</div>
		</div>
	</div>

<!-- Project verwijderen -->
	<div class="modal fade" id="modal-delete-project" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title pull-left"><i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Waarschuwing</h5>
				</div>
				<div class="modal-body">
					<div class="alert alert-danger" role="alert">
						<strong>Let op,</strong> Weet u zeker dat u dit project wilt verwijderen?.
					</div>
				</div>
				<div class="modal-footer">
					 <form action='IKWIL_Engine/IKWILDelete_functions.php' method='post' enctype='multipart/form-data'>
						<input type="hidden" name="project_id" value="<?php echo "$project_id" ?>" />
						<button type="button" class="btn btn-link" data-dismiss="modal">Annuleren</button>
						<button type="submit" name="delete_project" class="btn btn-danger"> Verwijderen</button>
					  </form>
				</div>
			</div>
		</div>
	</div>


<!-- Bijlage uploaden -->
	<div class="modal fade" id="modal-upload-attachment" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title pull-left"><i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Waarschuwing</h5>
				</div>
					<div class="modal-body">
						 <?php $null = "0"; ?>
						 <form action='IKWIL_Engine/IKWILUpload_attachment.php' method='post' enctype='multipart/form-data'>
						 <input type="hidden" name="attachment_person_id" value="<?php if($customer_page == $null){ echo "0"; } else{ echo "$person_id" ; }?>" />
						 <input type="hidden" name="attachment_company_id" value="<?php if($company_page == $null){ echo "0"; } else{ echo "$company_id" ; }?>" />
              			 <input type="hidden" name="attachment_project_id" value="<?php if($project_page == $null){ echo "0"; } else{ echo "$project_id" ; }?>" />
						 
							<div class="row">
								<div class="col-md-4">
									<div class="form-group label-floating">
									<label class="control-label">Bijlage titel*</label>
									<input type="text" name="attachment_title" class="form-control">
									</div>
								</div>
                			</div>
						 
						 <div class="row">
								<input type="file" name="file" />	
						 </div>
						 
					</div>
				<div class="modal-footer">
					
					
						<button type="button" class="btn btn-link" data-dismiss="modal">Annuleren</button>
						<button type="submit" name="btn-upload" class="btn btn-danger"> Upload</button>
					  </form>
				</div>
			</div>
		</div>
	</div>

<!-- Admin, gebruiker aanmaken -->
	<div class="modal fade" id="modal-create-account" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title pull-left"><i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Account aanmaken</h5>
				</div>
				<div class="modal-body">
					
					 <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
                <div class="login__block__body">
                    <div class="form-group form-group--float form-group--centered">
                        <input type="text" name="name" required value="<?php if($error) echo $name; ?>" class="form-control">
                        <label>Naam</label>
                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                        <i class="form-group__bar"></i>
                    </div>
					
					  <div class="form-group form-group--float form-group--centered">
                        <input type="text" name="surname" required value="<?php if($error) echo $surname; ?>" class="form-control">
                        <label>Achternaam</label>
                        <span class="text-danger"><?php if (isset($surname_error)) echo $surname_error; ?></span>
                        <i class="form-group__bar"></i>
                    </div>

                    <div class="form-group form-group--float form-group--centered">
                        <input type="text" name="email" required value="<?php if($error) echo $email; ?>" class="form-control">
                        <label>Email adres</label>
                        <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                        <i class="form-group__bar"></i>
                    </div>
                    
                     <div class="form-group form-group--float form-group--centered">
                        <input type="password" name="password" class="form-control">
                        <label>Wachtwoord</label>
                         <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                        <i class="form-group__bar"></i>
                    </div>

                    <div class="form-group form-group--float form-group--centered">
                        <input type="password" name="cpassword" class="form-control">
                        <label>Wachtwoord bevestigen</label>
                        <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                        <i class="form-group__bar"></i>
                    </div>
              
				
                </div>
            
					
				</div>
				<div class="modal-footer">
						<button type="button" class="btn btn-link" data-dismiss="modal">Annuleren</button>
						<button type="submit" name="signup" value="Registreren" class="btn btn-primary waves-effect">Registreren</button>
					  </form>
				</div>
			</div>
		</div>
	</div>