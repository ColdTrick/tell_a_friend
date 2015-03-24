<?php

$entity = elgg_extract("entity", $vars);
if (empty($entity) || !elgg_instanceof($entity)) {
	return;
}

$subject = $entity->title;
if (empty($subject)) {
	$subject = $entity->name;
}

$message = $entity->getURL();

echo "<div>";
echo "<label>" . elgg_echo("tell_a_friend:share:recipient") . "*</label>";
echo elgg_view("input/userpicker");
echo "<div class='ui-front'></div>";
echo "</div>";

echo "<div>";
echo "<label for='tell-a-friend-share-subject'>" . elgg_echo("tell_a_friend:share:subject") . "*</label>";
echo elgg_view("input/text", array("id" => "tell-a-friend-share-subject", "name" => "subject", "value" => $subject));
echo "</div>";

echo "<div>";
echo "<label for='tell-a-friend-share-message'>" . elgg_echo("tell_a_friend:share:message") . "*</label>";
echo elgg_view("input/plaintext", array("id" => "tell-a-friend-share-message", "name" => "message", "value" => $message));
echo "</div>";

echo "<div class='elgg-subtext'>" . elgg_echo("tell_a_friend:share:required") . "</div>";

echo "<div class='elgg-foot'>";
echo elgg_view("input/submit", array("value" => elgg_echo("send")));
echo "</div>";
?>
<script>
elgg.userpicker.init();
</script>