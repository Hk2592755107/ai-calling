<h2>Create Agent</h2>
<form method="POST" action="/agents">
    @csrf
    <input type="text" name="name" placeholder="Agent Name">
    <input type="text" name="vapi_assistant_id" placeholder="Assistant ID">
    <button>Create</button>
</form>

<hr>

<h2>Make Call</h2>
<select id="agent_id">
    @foreach($agents as $agent)
        <option value="{{ $agent->id }}">{{ $agent->name }}</option>
    @endforeach
</select>
<input type="text" id="phone" placeholder="+92XXXXXXXXXX">
<button onclick="makeCall()">Call</button>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function makeCall() {
        $.post('/make-call', {
            _token: '{{ csrf_token() }}',
            agent_id: $('#agent_id').val(),
            phone: $('#phone').val()
        }, function(res) {
            alert('Call Started 🚀');
        });
    }
</script>
