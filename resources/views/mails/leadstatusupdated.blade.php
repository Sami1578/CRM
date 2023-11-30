<!DOCTYPE html>
<html>
<head>
    <title>CRM</title>
</head>
<body>
<h1>Lead Status Updated Details:</h1>
<h3>{{ 'REP Id: '.$lead->member->id }}</h3>
<h3>{{ 'REP Name: '.$lead->member->name }}</h3>
<h3>{{ 'Business Name: '.$lead->business_name }}</h3>
<h3>{{ 'Revenue: '.$lead->revenue.'$' }}</h3>
<h3>{{ 'Lead Stage: '.$lead->leadstage->name }}</h3>
<h3>{{ 'Lead Status: '.$lead->leadstatus->name }}</h3>
<h3>{{ 'Call Back Time: '.$lead->call_back_time }}</h3>
@if($lead->messages)
<h3>{{ 'Message: '.($lead->messages->latest()) }}</h3>
@else
    <h3>{{ 'Message: No Messages' }}</h3>
@endif
<p>Thank you</p>
</body>
</html>
