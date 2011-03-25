<h1>
	<?php echo HTML::anchor('/', 'compressr.cc')?>
</h1>

<div id="wrapper">

	<?php if ($errors){?>
		<div class="form-errors">
			Please correct the errors:
			<ul>
			<?php foreach($errors as $error => $message){?>
				<li><?php echo $message?></li>		
			<?php }?>
			</ul>
		</div>
	<?php }?>

	<?php echo Form::open()?>
		<fieldset>
			<ol id="option-list">
				<li class="clear">
					<h2><label for="compressor">Choose your compressor</label></h2>
					<div class="label">
						<label for="compressor">
							Compressor
						</label>
					</div>
					<div class="field">
						<?php echo Form::select('compressor', $compressors, @$_POST['compressor'])?>
					</div>
				</li>
				<li>
					<h2>Set the compressor options</h2>
					<fieldset class="options-container" id="options-yui">
						<ul>
							<li class="clear">
								<div class="label">
									Type
								</div>
								<div class="field">
									<label>
										<?php echo Form::radio('option-yui-type', 'js', (@$_POST['option-yui-type'] == 'js'), array('class' => 'radio'), $errors)?>
										Javascript
									</label>
									<br />
									<label>
										<?php echo Form::radio('option-yui-type', 'css', (@$_POST['option-yui-type'] == 'css'), array('class' => 'radio'), $errors)?>
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
									<?php echo Form::select('options-closure_compilation_level', $options_closure_compilation_levels, @$_POST['options-closure_compilation_level']);?>
								</div>
							</li>
							<li class="clear">
								<div class="label">
									<label for="options-closure_warning_level">
										Warning level
									</label>
								</div>
								<div class="field">
									<?php echo Form::select('options-closure_warning_level', $options_closure_warning_levels, @$_POST['options-closure_warning_level']);?>
								</div>
							</li>
							<li class="clear">
								<div class="label">
									<label for="options-closure-pretty_print">
										Pretty print
									</label>
								</div>
								<div class="field">
										
									<?php echo Form::checkbox('options-closure-pretty_print', '1', (@$_POST['options-closure-pretty_print'] == '1'), array('class' => 'checkbox'), $errors)?>
								</div>
							</li>
						</ul>
					</fieldset>
					<fieldset class="options-container" id="options-uglify">
						<ul>
							<li class="clear">
								<div class="label">
									<label for="option-uglify-beautify">
										Beautify
									</label>
								</div>
								<div class="field">
									<?php echo Form::checkbox('option-uglify-beautify', '1', (@$_POST['option-uglify-beautify'] == '1'), array('class' => 'checkbox'), $errors)?>
								</div>
							</li>
							<li class="clear">
								<div class="label">
									<label for="option-uglify-nomangle">
										No mangle
									</label>
								</div>
								<div class="field">
									<?php echo Form::checkbox('option-uglify-nomangle', '1', (@$_POST['option-uglify-nomangle'] == '1'), array('class' => 'checkbox'), $errors)?>
								</div>
							</li>
							<li class="clear">
								<div class="label">
									<label for="option-uglify-nocopyright">
										No copyright
									</label>
								</div>
								<div class="field">
									<?php echo Form::checkbox('option-uglify-nocopyright', '1', (@$_POST['option-uglify-nocopyright'] == '1'), array('class' => 'checkbox'), $errors)?>
								</div>
							</li>
						</ul>
					</fieldset>
					<fieldset class="options-container" id="options-all">
						<p><em>(Using default options)</em></p>
					</fieldset>
				</li>
				<li>
					<h2><label for="code">Paste your code</label></h2>
					<?php echo Form::textarea('code', @$_POST['code'], NULL, TRUE, $errors)?>
				</li>
				<li>
					<button type="submit">
						Compress it!
					</button>
				</li>
			</ol>
		</fieldset>
	<?php echo Form::close()?>
</div>
