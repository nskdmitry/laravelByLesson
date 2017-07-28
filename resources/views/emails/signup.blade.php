<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>You are registered on blog.dev</title>
</head>
<body>
  <p>Hello, {{ $user->name}}!</p>
  <p>You are take this mail because your registration was successful on {{ date('Y-m-d H:i:s') }}.</p>
  <p>Delete unusable account by <a href='http://blog.dev/users/{{ $user->id }}/remove'>link</a> if yourself not registered in.</p>
  <p>Sorry for distrubes.</p>
  <p>PS: this mail was send automatically, don't response them.</p>
</body>
</html>