<html>
    <head>
        <title>Pop_up Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">
            <h2>Smart Mind</h2>
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#simpleModal">Open Modal</button>

            <!----Simple Modal--->
            <div class="modal fade" id="simpleModal" role="dialog">
                <div class="modal-dialog">

                <!-----modal content--->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Welcome to Smart Mind Youtube Channerl</h5>
                    </div>
                    <div class="model-body">
                        <p>Some text in the model.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-deafult" data-dismiss="modal">Close</button>
                    </div>
        
                </div>
            
            </div>
        </div>

    </body>
</html>