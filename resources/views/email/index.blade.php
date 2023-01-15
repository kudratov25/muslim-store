<x-mail::message>
# Order Shipped
 
Your order has been shipped!
<x-mail::button :url="$url" color="success">
View Order
</x-mail::button>
 <h5>{{$request->user()->name}}</h5>
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>