@component('mail::message')
# Hello, {{ $user->name  }}!

You are sign in our site on {{ date('Y-m-d H:i:s') }}.<br/>
If it was do a not you, then your accout was hacked and you shall send e-mail about it.

@component('mail::button', ['url' => 'https://blog.dev/users/' . $user->id . '/help' ])
My account is hacked!
@endcomponent

Thanks,<br>
{{ $user->name }}
@endcomponent
