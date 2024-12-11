<!DOCTYPE html>
<html>
<head>
    <title>Country State City Dropdown</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<select id="country">
    <option value="">Select Country</option>
    @foreach($countries as $list)
        <option value="{{ $list->id }}">{{ $list->name }}</option>
    @endforeach
</select>

<select id="state">
    <option value="">Select State</option>
</select>

<select id="city">
    <option value="">Select City</option>
</select>

<script>
$(document).ready(function() {
    $('#country').change(function() {
        var cid = $(this).val();
        $('#state').html('<option value="">Select State</option>');
        $('#city').html('<option value="">Select City</option>');
        $.ajax({
            url: "{{ url('/getState') }}",
            type: 'POST',
            data: {
                cid: cid,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#state').html(response.html);
            }
        });
    });

    $('#state').change(function() {
        var sid = $(this).val();
        $('#city').html('<option value="">Select City</option>');
        $.ajax({
            url: "{{ url('/getCity') }}",
            type: 'POST',
            data: {
                sid: sid,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#city').html(response.html);
            }
        });
    });
});
</script>

</body>
</html>
