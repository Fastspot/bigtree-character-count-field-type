<?
	$type = $data["draw_type"] ? $data["draw_type"] : "text";
	$max = $data["max"] ? intval($data["max"]) : "";
?>
<fieldset>
	<label>Draw As</label>
	<select name="draw_type">
		<option value="text">Single Line</option>
		<option value="textarea"<? if ($type == "textarea") { ?> selected="selected"<? } ?>>Multi-Line Text Box</option>
	</select>
</fieldset>
<fieldset class="last">
	<label>Max Characters</label>
	<input type="text" name="max" value="<?=$max?>">
</fieldset>