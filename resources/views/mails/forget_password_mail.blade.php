<!DOCTYPE html>
<html>
<head>
  <title>ZindaWork</title>
</head>

<body>

	Dear <b>{{ $pass->name }}</b>, <br/>
	<h3>Can't remember your password?</h3>
	<p>
		Use This Link to Reset Password: <a href="{{ url('/') . '/password/reset/' . $pass->code }}" target="_blank">{{ url('/') . '/password/reset/' . $pass->code }}</a>
	</p>
	
	Thank You,
	<br/>
	<i>ZindaWork</i>

</body>
</html>