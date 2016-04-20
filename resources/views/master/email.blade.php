<html>
<head>
    <title>The Nine Grounds</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.1.2/foundation.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0-beta.1/themes/smoothness/jquery-ui.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0-beta.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/foundation/6.1.2/foundation.min.js"></script>
</head>
<body>
<div class="row wrapper">
    <div class="small-12 columns">
        @yield('content')
    </div>
</div>
<div class="footer">

</div>
<script type="text/javascript">
    $(function() {
        $(document).foundation();
    });
</script>
</body>
</html>