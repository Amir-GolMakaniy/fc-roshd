<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.rtl.min.css') }}">
</head>
<body>
{{ $slot }}
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script>
    function input(number) {
        let value = number.value;
        value = value.replace(/\D/g, '');
        let formattedValue = '';
        while (value.length > 3) {
            formattedValue = ',' + value.slice(-3) + formattedValue;
            value = value.slice(0, value.length - 3);
        }
        formattedValue = value + formattedValue;
        number.value = formattedValue;
    }
</script>
</body>
</html>
