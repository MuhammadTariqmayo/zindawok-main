@component('mail::message')
# Introduction
company Name:
{{ $detail['company'] }}
Username:
{{ $detail['uname'] }}

useremail:
{{ $detail['email'] }}

user number:
{{ $detail['number'] }}

user address:
{{ $detail['address'] }}

The body of your message.
user inquary:
{{ $detail['textarea'] }}





@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
