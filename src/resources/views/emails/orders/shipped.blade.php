@component('mail::message')
# Order Shipped

Your order has been shipped!

{{ $order->note }}
{{ $order->price }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent