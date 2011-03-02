<div id="wrapper">

	<h1>compressr.cc</h1>

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
						<select name="compressor" id="choose-compressor">
							<option>Closure compiler</option>
							<option>YUI compressor</option>
							<option>Packer</option>
							<option>Uglify</option>
						</select>
					</div>
				</li>
				<li>
					<h2>Set the compressor options:</h2>
					<fieldset>
						<div class="field"><label><input type="checkbox" /> Option 1</label></div>
						<div class="field"><label><input type="checkbox" /> Option 2</label></div>
						<div class="field"><label><input type="checkbox" /> Option 3</label></div>
					</fieldset>
				</li>
				<li>
					<h2><label for="code">Paste your code:</label></h2>
					<div class="field">
						<textarea name="code" id="code"></textarea>
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
