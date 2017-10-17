<!DOCTYPE html>
<html>
<head>
	<title>{{ $customer['title'] }}</title>
</head>
<body>
	
	{!! $customer['body'] !!}

Thanks,
{{ config('app.name') }}
</body>
</html>