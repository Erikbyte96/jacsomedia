<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/main.css?version=51">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/all.css" rel="stylesheet">
    <link href="css/fontawesome.css" rel="stylesheet">
    <link href="css/brands.css" rel="stylesheet">
    <link href="css/solid.css" rel="stylesheet">
    <style>
        #list {
            background-color: var(--grey);
            display: block;
            width: 50%;
            margin: 0 auto;
            text-align: center;
            margin-top: 160px;
        }

        #sortable1, #sortable2 {
            border: 1px solid #eee;
            width: 220px;
            min-height: 20px;
            list-style-type: none;
            padding: 5px 0 0 0;
            display: inline-block;
            margin: 0 auto;
            margin-right: 10px;
            color: var(--white);
            vertical-align: top;
            text-align: center;
        }
        #sortable1 li, #sortable2 li {
            margin: 0 5px 5px 5px;
            padding: 5px;
            font-size: 1.2em;
            width: 210px;
        }

        #sortable1 li {
            color: var(--white);
            background-color: var(--site-color);
        }

        #sortable2 li {
            color: var(--white);
            background-color: var(--purple);
        }
    </style>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <title>Jacsomedia</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#sortable1, #sortable2" ).sortable({
                connectWith: ".connectedSortable"
            }).disableSelection();
        } );
    </script>
</head>
<body>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->

<?php
include('header_logged.php');
?>

<div class="container">
    <div id="list">
        <ul id="sortable1" class="connectedSortable">
            <?php
            $conn = new mysqli('localhost','root','','jacsomedia');
            if ($conn->connect_error) {
                die('Error : ('. $conn->connect_errno .') '. $conn->connect_error);
            }
            $results = $conn->query("SELECT text FROM dragdrop ORDER BY listorder ASC");
            while($row = $results->fetch_assoc()) {
                $text=$row['text'];
                ?>
                <li class="ui-state-default"> <?php echo $text; ?>
                    <div class="clear"></div>
                </li>
            <?php } ?>
        </ul>
        <ul id="sortable2" class="connectedSortable">

        </ul>
    </div>
    <div class="save-button-wrapper">
        <button type="submit" class="save-button">SAVE</button>
    </div>
</div>

<?php
include('footer.php');
?>

</body>
</html>