@component('mail::message')
# Hacker Dangerous Alarm!

Hello, dear administration of site a blog.dev.

My name a {{ $user->name }} and I am a user of your site.
Whoever was logged on site by my account, I am not be is this.
So I suspect a theft of my account's data (like as login and password).
I sure what is argument to searching a vulnerability for you even if it is my fault.

@component('mail::button', ['url' => '/users/'.$user->id.'/profile'])
    Managed suspected account
@endcomponent

Thanks for activity and concernment,<br>
{{ $user-name }}
@endcomponent
