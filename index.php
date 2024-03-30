<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AniketGPT</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative; /* To position loader relative to the container */
        }

        h1 {
            color: #333;
        }

        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        #response {
            margin-top: 20px;
            padding: 10px;
            background-color: #f2f2f2;
            border-radius: 4px;
        }

        /* Loader styles */
        #loader {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none; /* Hide loader by default */
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>AniketGPT</h1>
        <input type="text" id="text" placeholder="Enter your text here">
        <br><br>
        <button onclick="generateResponse()">Generate Response</button>
        <br><br>
        <div id="response"></div>
        <!-- Bootstrap spinner loader -->
        <div class="spinner-grow text-primary loader" id="loader" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <!-- Bootstrap JS (Optional, for some Bootstrap components) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function generateResponse() {
            var text = document.getElementById("text").value;
            var response = document.getElementById("response");
            var loader = document.getElementById("loader");

            // Show loader while fetching response
            loader.style.display = "block";

            fetch("response.php", {
                method: "POST",
                body: JSON.stringify({
                    text: text
                })
            })
            .then((res) => res.text())
            .then((res) => {
                response.innerHTML = res;
                // Hide loader after response is received
                loader.style.display = "none";
            })
            .catch((error) => {
                console.error('Error:', error);
                // Hide loader in case of error
                loader.style.display = "none";
            });
        }
    </script>
</body>
</html>
