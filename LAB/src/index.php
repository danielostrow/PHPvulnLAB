<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SOME CYBER CRIME GROUPs WEBSITE... just a simulation btw</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#fileForm').submit(function(e){
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url: 'upload.php',
                    type: 'POST',
                    data: formData,
                    async: true,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data.success) {
                            // Show success message on index.php
                            $('#uploadStatus').html(data.message);
                        } else {
                            // Show error message on index.php
                            $('#uploadStatus').html(data.message);
                        }
                    }
                });
            });
        });
    </script>
</head>
<body>
<div class="container">
    <h1>Hi! Sorry we took your stuff.</h1>
    <p>Upload a sample encrypted file to test our decryption that will prove we will give back your stuff after payment is made of $3.00 USD.</p>
    <form id="fileForm" enctype="multipart/form-data" method="post">
        Select document to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Document" name="submit">
    </form>
    <div id="uploadStatus"></div>
</div>
</body>
</html>
