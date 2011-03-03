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
						<select name="compressor" id="choose-compressor">
							<option value="closure">Closure compiler</option>
							<option value="yui">YUI compressor</option>
							<option value="packer">Packer</option>
							<option value="uglify">Uglify</option>
						</select>
					</div>
				</li>
				<li>
					<h2>Set the compressor options:</h2>
					<fieldset class="options-container" id="options-yui">
						<p>Type:</p>
						<div class="field"><label><input type="radio" name="option-yui-type" value="js" checked="checked" /> Javascript</label></div>
						<div class="field"><label><input type="radio" name="option-yui-type" value="css" /> CSS</label></div>
					</fieldset>
					<fieldset class="options-container" id="options-closure">
						closure
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
