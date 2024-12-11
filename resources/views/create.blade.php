<!-- resources/views/location.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Location Select</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Select Location</h1>
    <form>
        <label for="country">Country:</label>
        <select id="country" name="country">
            <option value="">Select Country</option>
            @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </select>

        <label for="state">State:</label>
        <select id="state" name="state">
            <option value="">Select State</option>
        </select>

        <label for="city">City:</label>
        <select id="city" name="city">
            <option value="">Select City</option>
        </select>
    </form>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#country').change(function() {
                var countryId = $(this).val();
                if (countryId) {
                    $.ajax({
                        url: '/states/' + countryId,
                        type: 'GET',
                        success: function(data) {
                            $('#state').empty();
                            $('#state').append('<option value="">Select State</option>');
                            $.each(data, function(key, value) {
                                $('#state').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                            });
                        }
                    });
                } else {
                    $('#state').empty();
                    $('#city').empty();
                }
            });

            $('#state').change(function() {
                var stateId = $(this).val();
                if (stateId) {
                    $.ajax({
                        url: '/cities/' + stateId,
                        type: 'GET',
                        success: function(data) {
                            $('#city').empty();
                            $('#city').append('<option value="">Select City</option>');
                            $.each(data, function(key, value) {
                                $('#city').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                            });
                        }
                    });
                } else {
                    $('#city').empty();
                }
            });
        });
    </script>
</body>
</html>
