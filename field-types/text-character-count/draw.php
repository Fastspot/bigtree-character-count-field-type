<?
	/*
		When drawing a field type you are provided with the $field array with the following keys:
			"title" — The title given by the developer to draw as the label (drawn automatically)
			"subtitle" — The subtitle given by the developer to draw as the smaller part of the label (drawn automatically)
			"key" — The value you should use for the "name" attribute of your form field
			"value" — The existing value for this form field
			"id" — A unique ID you can assign to your form field for use in JavaScript
			"tabindex" — The current tab index you can use for the "tabindex" attribute of your form field
			"options" — An array of options provided by the developer
			"required" — A boolean value of whether this form field is required or not
	*/

	$max = $field["options"]["max"] ? intval($field["options"]["max"]) : 0;
?>
<div class="text_input">
	<?
		if ($field["options"]["draw_type"] == "textarea") {
	?>
	<textarea class="<?=$field["options"]["validation"]?>" type="text" tabindex="<?=$field["tabindex"]?>" name="<?=$field["key"]?>" id="<?=$field["id"]?>"<? if ($max) { ?> maxlength="<?=$max?>"<? } ?>><?=$field["value"]?></textarea>
	<?
		} else {
	?>
	<input class="<?=$field["options"]["validation"]?>" type="text" tabindex="<?=$field["tabindex"]?>" name="<?=$field["key"]?>" value="<?=$field["value"]?>" id="<?=$field["id"]?>"<? if ($max) { ?> maxlength="<?=$max?>"<? } ?> />
	<?
		}
	?>
	<div style="color: #999; display: block; margin: 5px 0 0;">
		<span class="cc_display"><?=($max ? ($max - strlen($field["value"])) : strlen($field["value"]))?></span> Characters<? if ($max) { ?> Left<? } ?>
	</div>
</div>
<script>
	$("#<?=$field["id"]?>").on("keyup",function() {
		var length = $(this).val().length;
		var display = $(this).parent().find(".cc_display");

		<? if ($max) { ?>
		display.html(<?=$max?> - length);
		<? } else { ?>
		display.html(length);
		<? } ?>
	});
</script>