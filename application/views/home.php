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
				<li>
					<h2><label for="compressor">Choose your compressor</label></h2>
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
									<label><input type="radio" name="option-yui-type" value="js" checked="checked" /> Javascript</label> <br />
									<label><input type="radio" name="option-yui-type" value="css" /> CSS</label>
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
									<?php echo Form::input('options-closure-pretty_print', NULL, array('type' => 'checkbox', 'class' => 'checkbox'), $errors)?>
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
									<?php echo Form::input('option-uglify-beautify', NULL, array('type' => 'checkbox', 'class' => 'checkbox'))?> 
								</div>
							</li>
							<li class="clear">
								<div class="label">
									<label for="option-uglify-nomangle">
										No mangle
									</label>
								</div>
								<div class="field">
									<?php echo Form::input('option-uglify-nomangle', NULL, array('type' => 'checkbox', 'class' => 'checkbox'))?> 
								</div>
							</li>
							<li class="clear">
								<div class="label">
									<label for="option-uglify-nocopyright">
										No copyright
									</label>
								</div>
								<div class="field">
									<?php echo Form::input('option-uglify-nocopyright', NULL, array('type' => 'checkbox', 'class' => 'checkbox'))?> 
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
					<div class="field">
						<?php echo Form::textarea('code', @$_POST['code'], NULL, TRUE, $errors)?>
					</div>
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
