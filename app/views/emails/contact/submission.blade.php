<html>

<head>
	<title>Contact Submission!</title>
</head>

<body>
	<p>Hey Annie,</p>
	<p>My name is <b>{{ $contact['name'] }}</b> and I found you on AnnieDigital.com! My email is <b>{{ $contact['email'] }}</b>, and here’s what I wanted to say:</p>
	<blockquote>{{ $markdown->text($contact['comments']) }}</blockquote>
	<p>Thanks for your time!</p>
	<p><b>{{ $contact['name'] }}</b></p>
</body>

</html>
