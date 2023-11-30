<!DOCTYPE html>
<html>
<head>
    <title>CRM</title>
</head>
<body>
<h1>Lead Status Updated Details:</h1>
<h3><?php echo e('REP Id: '.$lead->member->id); ?></h3>
<h3><?php echo e('REP Name: '.$lead->member->name); ?></h3>
<h3><?php echo e('Business Name: '.$lead->business_name); ?></h3>
<h3><?php echo e('Revenue: '.$lead->revenue.'$'); ?></h3>
<h3><?php echo e('Lead Stage: '.$lead->leadstage->name); ?></h3>
<h3><?php echo e('Lead Status: '.$lead->leadstatus->name); ?></h3>
<h3><?php echo e('Call Back Time: '.$lead->call_back_time); ?></h3>
<?php if($lead->messages): ?>
<h3><?php echo e('Message: '.($lead->messages->latest())); ?></h3>
<?php else: ?>
    <h3><?php echo e('Message: No Messages'); ?></h3>
<?php endif; ?>
<p>Thank you</p>
</body>
</html>
<?php /**PATH /home/sellhwja/cnbcrm.org/resources/views/mails/leadstatusupdated.blade.php ENDPATH**/ ?>