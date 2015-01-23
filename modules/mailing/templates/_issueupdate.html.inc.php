<?php

$broken = false;

if(isset($issue)) {
  $issue_title = $issue->getFormattedTitle(true);
  $issue_name = $issue->getProject()->getName();
  $issue_key = $issue->getProject()->getKey();
  $issue_nbr = $issue->getFormattedIssueNo();
} else {
  $broken = true;
  $issue_title = 'An issue';
  $issue_name = 'An issue';
  $issue_key = '';
  $issue_nbr = '';
}

if(isset($updated_by) && is_object($updated_by)) {
  $updated_by_name = $updated_by->getName();
} else {
  $updated_by_name = 'somebody we couldn’t figure while sending this email';
  $broken = true;
}

if(!isset($comment) ) {
  $comment = '(no comments provided)';
}

?><div style="font-family: 'Trebuchet MS', 'Liberation Sans', 'Bitstream Vera Sans', 'Luxi Sans', Verdana, sans-serif; font-size: 11px; color: #333;">
	Hi, %user_buddyname%!<br>
	<?php echo $issue_title; ?> was updated by <?php echo $updated_by_name; ?>.<br>
	<br>
	<?php echo tbg_parse_text($comment); ?>
	<br>
	<div style="color: #888;">
	--
	<br>
	Show issue: <?php echo link_tag("%thebuggenie_url%".make_url('viewissue', array('project_key' => $issue_key, 'issue_no' => $issue_nbr))); ?><br>
	Show <?php echo $issue_name; ?> project dashboard: <?php echo link_tag("%thebuggenie_url%".make_url('project_dashboard', array('project_key' => $issue_key)));

if($broken === true) {
echo '

It seems an error slipped in while sending this email, could you please notify team-webplatform-systems@w3.org that you encountered this message. Thanks!

';
} ?>
	</div>
</div>
