<!DOCTYPE html>
<html>
<head>
    <title>CRM</title>
</head>
<body>
<h1>New Lead Added Details:</h1>
<h3><?php echo e('Business Name: '.$lead->business_name); ?></h3>
<h3><?php echo e('Revenue: '.$lead->revenue); ?></h3>
<h3><?php echo e('Lead Stage: '.$lead->lead_stage); ?></h3>
<h3><?php echo e('Call Back Time: '.$lead->call_back_time); ?></h3>
<h3><?php echo e('Message: '.$lead->message); ?></h3>
<p>Thank you</p>
</body>
</html>
<?php /**PATH /home/sellhwja/cnbcrm.org/resources/views/mails/newleadadded.blade.php ENDPATH**/ ?>