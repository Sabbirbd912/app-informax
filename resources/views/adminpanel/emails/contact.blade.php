<h2>New Contact Message</h2>

<p><strong>Name:</strong> {{ $data['name'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>

@if($data['company'])
<p><strong>Company:</strong> {{ $data['company'] }}</p>
@endif

@if($data['service'])
<p><strong>Service:</strong> {{ $data['service'] }}</p>
@endif

<p><strong>Message:</strong></p>
<p>{{ $data['message'] }}</p>
