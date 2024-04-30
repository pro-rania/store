<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
   integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
   crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>search</title>
</head>
<body>
    <input type="text" name="name" id="name" placeholder="search">
    <div id="result"></div>
    <script>
        $(document).ready(function(){
            $("#name").on('keyup',function(){
                var myval = $("#name").val();
                $.ajax({
                type:"get",
                url:"{{ route('search') }}",
                data:{ 'name':myval },
                success:function(data){
                   $('#result').html(data);
                },
                error:function(error){
                   $('#result').text(error.responseText);
                }
                });
            });
        });
    </script>
</body>
</html>