<?php

$entity = elgg_extract("entity", $vars);
if (empty($entity) || !elgg_instanceof($entity)) {
	return;
}

$user = elgg_get_logged_in_user_entity();

$subject = elgg_echo("tell_a_friend:share:subject:default", array($user->name));

$title = $entity->title;
if (empty($title)) {
	$title = $entity->name;
}
$message = elgg_echo("tell_a_friend:share:message:default", array(
	$user->name,
	$title,
	$entity->getURL()
));

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