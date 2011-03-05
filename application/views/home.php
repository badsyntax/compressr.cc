<h1>compressr.cc</h1>

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
					<h2><label for="choose-compressor">Choose your compressor:</label></h2>
					<div class="field">
						<?php echo Form::select('compressor', $compressors, @$_POST['compressor'])?>
					</div>
				</li>
				<li>
					<h2>Set the compressor options:</h2><br />
					<fieldset class="options-container" id="options-yui">
						<p>Type:</p>
						<div class="field"><label><input type="radio" name="option-yui-type" value="js" checked="checked" /> Javascript</label></div>
						<div class="field"><label><input type="radio" name="option-yui-type" value="css" /> CSS</label></div>
					</fieldset>
					<fieldset class="options-container" id="options-closure">
						<div class="field">
							<label>
								Compilation level
								<?php echo Form::select('options_closure_compilation_level', $options_closure_compilation_levels, @$_POST['options_closure_compilation_level']);?>
							</label>
						</div>
						<div class="field">
							<label>
								Warning level
								<?php echo Form::select('options_closure_warning_level', $options_closure_warning_levels, @$_POST['options_closure_warning_level']);?>
							</label>
						</div>
						<div class="field">
							<label>
								<?php echo Form::input('options-closure-pretty_print', NULL, array('type' => 'checkbox'), $errors)?>
								Pretty print
							</label>
						</div>
					</fieldset>
					<fieldset class="options-container" id="options-uglify">
						<div class="field"><label><input type="checkbox" name="option-uglify-beautify" /> Beautify</label></div>
						<div class="field"><label><input type="checkbox" name="option-uglify-nomangle" /> No mangle</label></div>
						<div class="field"><label><input type="checkbox" name="option-uglify-nocopyright" /> No copyright</label></div>
					</fieldset>
					<fieldset class="options-container" id="options-all">
						<p><em>(Using default options)</em></p>
					</fieldset>
				</li>
				<li>
					<h2><label for="code">Paste your code:</label></h2>
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
