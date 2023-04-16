<x-mail::message>
# Successfully Establish School
 
{{$author}} as admin is now create a new school.
 
<x-mail::button :url="$url">
View School
</x-mail::button>
 
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>