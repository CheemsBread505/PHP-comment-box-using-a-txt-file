<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP comment box using a txt file</title>
</head>
<body>
    <form method="post">
    <textarea name="txt" cols="25" rows="5"></textarea>
    <br><br> <input type="submit" value="Submit" name="submit" />

    <?php
    if ( isset( $_POST[ 'submit' ] ) ) {
        $com  = $_POST[ "txt" ];
        $file = fopen( "msg.txt", "a" );
        fwrite( $file, "<br>" );
        for ( $i = 0; $i <= strlen( $com ) - 1; $i++ ) {
        fwrite( $file, $com[ $i ] );
        if ( $i % 37 == 0 && $i != 0 ) fwrite( $file, "<br/>" );
        }
        fwrite( $file, "<br>------------------------------------------" );
        fclose( $file );
    echo '<script type="text/javascript">window.location ="";</script>'; // Add here
    }
    ?>

    <br>
    </form>
    <?php
    if (file_exists("msg.txt")) {
    $file = fopen( "msg.txt", "r" );
    echo fread( $file, filesize( "msg.txt" ) );
    fclose( $file );
    }
    ?>
</body>
</html>