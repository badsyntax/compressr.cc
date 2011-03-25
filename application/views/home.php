<header>
	<h1>
		<?php echo HTML::anchor('/', 'compressr.cc')?>
	</h1>
</header>

<?php if ($errors){?>
	<div class="container" style="text-align:left">
		<div class="form-errors">
			<ul>
			<?php foreach($errors as $error => $message){?>
				<li><?php echo $message?></li>		
			<?php }?>
			</ul>
		</div>
	</div>
<?php }?>


<div class="container" role="main">

	<?php echo Form::open(NULL, array('id' => 'compressor-form')), "\n"?>
		<fieldset>
			<ol id="option-list">
				<li class="clear">
					<div class="label">
						<label for="compressor">
							Compressor
						</label>
					</div>
					<div class="field">
						<?php echo Form::select('compressor', $compressors, @$_POST['compressor']), "\n"?>
					</div>
				</li>
				<li id="compressor-options">
					<fieldset class="options-container" id="options-yui">
						<ul>
							<li class="clear">
								<div class="label">
									Type
								</div>
								<div class="field">
									<label>
										<?php echo Form::radio(
											'option-yui-type', 
											'js', 
											(@$_POST['option-yui-type'] == 'js' or !@$_POST['option-yui-type']), 
											array('class' => 'radio', 'id' => 'option-yui-type-js'), 
											$errors
										), "\n"?>
										Javascript
									</label>
									<br />
									<label>
										<?php echo Form::radio(
											'option-yui-type', 
											'css', 
											(@$_POST['option-yui-type'] == 'css'), 
											array('class' => 'radio', 'id' => 'option-yui-type-css'), 
											$errors
										), "\n"?>
										CSS
									</label>
								</div>
							</li>
						</ul>
					</fieldset>
					<fieldset class="options-container" id="options-closure">
						<ul>
							<li class="clear">
								<div class="label">
									<label for="options-closure_compilation_level">
										Compilation level
									</label>
								</div>
								<div class="field">
									<?php echo Form::select('options-closure_compilation_level', $options_closure_compilation_levels, @$_POST['options-closure_compilation_level']), "\n";?>
								</div>
							</li>
							<li class="clear">
								<div class="label">
									<label for="options-closure_warning_level">
										Warning level
									</label>
								</div>
								<div class="field">
									<?php echo Form::select('options-closure_warning_level', $options_closure_warning_levels, @$_POST['options-closure_warning_level']), "\n";?>
								</div>
							</li>
							<li class="clear">
								<div class="field label-style">
									<?php echo Form::checkbox('options-closure-pretty_print', '1', (@$_POST['options-closure-pretty_print'] == '1'), array('class' => 'checkbox'), $errors), "\n"?>
								</div>
								<div class="label field-style">
									<label for="options-closure-pretty_print">
										Pretty print
									</label>
								</div>
							</li>
						</ul>
					</fieldset>
					<fieldset class="options-container" id="options-uglify">
						<ul>
							<li class="clear">
								<div class="field label-style">
									<?php echo Form::checkbox('option-uglify-beautify', '1', (@$_POST['option-uglify-beautify'] == '1'), array('class' => 'checkbox'), $errors), "\n"?>
								</div>
								<div class="label field-style">
									<label for="option-uglify-beautify">
										Beautify
									</label>
								</div>
							</li>
							<li class="clear">
								<div class="field label-style">
									<?php echo Form::checkbox('option-uglify-nomangle', '1', (@$_POST['option-uglify-nomangle'] == '1'), array('class' => 'checkbox'), $errors), "\n"?>
								</div>
								<div class="label field-style">
									<label for="option-uglify-nomangle">
										No mangle
									</label>
								</div>
							</li>
							<li class="clear">
								<div class="field label-style">
									<?php echo Form::checkbox('option-uglify-nocopyright', '1', (@$_POST['option-uglify-nocopyright'] == '1'), array('class' => 'checkbox'), $errors), "\n"?>
								</div>
								<div class="label field-style">
									<label for="option-uglify-nocopyright">
										No copyright
									</label>
								</div>
							</li>
						</ul>
					</fieldset>
					<fieldset class="options-container" id="options-all">
						<p><em>(Using default options)</em></p>
					</fieldset>
				</li>
				<li>
					<label for="codetext">Code</label>
					<?php echo Form::textarea('codetext', @$_POST['codetext'], NULL, TRUE, $errors), "\n"?>
				</li>
				<li>
					<button type="submit">
						Compress it!
					</button>
				</li>
			</ol>
		</fieldset>
	<?php echo Form::close(), "\n"?>
</div>
