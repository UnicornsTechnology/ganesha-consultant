{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>chat</title>
</head>

<body style="background-color: black;color:white">
    <h1>Chat app</h1>
    <button onclick="FireEvent()">Click</button>
</body>
@vite('resources/js/app.js')
<script>
    setTimeout(() => {
        window.Echo.channel('chat_message').listen('chat', (data) => {
            console.log(data);
        })
    }, 200);

    const FireEvent = () => {
        axios.post('/borcast', {
                headers: {
                    "X-CSRF-TOKEN": '{{ csrf_token() }}'
                }
            })
            .then(function(response) {
                console.log(response);
            })
            .catch(function(error) {
                console.log(error);
            });
    }
</script>

</html> --}}
