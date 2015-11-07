From: {{ $name }} <{{ $email }}><br>
@if (isset($phone))
	Phone: {{ $phone }}<br>
@endif
<br>
<pre>
{{ $comments }}
</pre>
