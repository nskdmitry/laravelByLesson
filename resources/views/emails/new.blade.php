<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8" />
      <title>New user is registered on blog.dev</title>
  </head>
  <body>
    <p>User #{{ $user->id }} with nickname {{ $user->name }} is registered on {{ date('Y-m-d H:i:s') }}.</p>
    <p>Would you candly say welcome for him/her. If you decide of this is bot, please delete this account to fuck.</p>
    <p><a href="http://blog.dev/login">Say hello and test a new account</a>.</p>
  </body>
</html>