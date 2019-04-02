<h2>Hello {{$vacation->user->name}}</h2>
<p>
	This is confirm your application has been {{$vacation->status}}
	@if($vacation->status == "Rejected")
		because of {{$vacation->reason}}
	@endif
</p>