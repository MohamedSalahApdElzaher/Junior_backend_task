@component('mail::message')
# Hi: {{$employee->name}}

You added successfully, Welcome to new {{$employee->company->name}} company.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
