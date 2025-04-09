<?php
    require 'assets/php/db.php';

    if(isset($_POST["text"]) && $_POST["text"]=="ctz"){
        $books = R::getAll( 'SELECT * FROM ABT_CTS_CITIZENSHIP' );
        $arr;
        foreach($books as $book) {
            $arr[] = $book;
        }
        echo json_encode($arr);
    }


    if(isset($_POST["text"]) && $_POST["text"]=="cnt"){
        $books = R::getAll( 'SELECT * FROM ABT_CNT_COUNTRY' );
        $arr;
        foreach($books as $book) {
            $arr[] = $book;
        }
        echo json_encode($arr);
    }


    if(isset($_POST["text"]) && $_POST["text"]=="area"){
        $books = R::getAll( 'SELECT * FROM ABT_ARE_AREA' );
        $arr;
        foreach($books as $book) {
            $arr[] = $book;
        }
        echo json_encode($arr);
    }

    if(isset($_POST["text"]) && $_POST["text"]=="disrictOnly"){
        $books = R::getAll( 'SELECT * FROM ABT_RGN_REGION');
        $arr;
        foreach($books as $book) {
            $arr[] = $book;
        }
        echo json_encode($arr);
    }

    if(isset($_POST["text"]) && $_POST["text"]=="disrict"){
        $ARE_ID = $_POST["id"];
        $books = R::getAll( 'SELECT * FROM ABT_RGN_REGION WHERE ARE_ID='.$ARE_ID);
        $arr;
        foreach($books as $book) {
            $arr[] = $book;
        }
        echo json_encode($arr);
    }

    if(isset($_POST["text"]) && $_POST["text"]=="city"){
        $RGN_ID = $_POST["id"];
        $books = R::getAll( 'SELECT * FROM ABT_LOC_LOCALITY WHERE RGN_ID='.$RGN_ID);
        $arr;
        foreach($books as $book) {
            $arr[] = $book;
        }
        echo json_encode($arr);
    }

    if(isset($_POST["text"]) && $_POST["text"]=="schoolType"){
        $books = R::getAll( 'SELECT * FROM ABT_SCT_SCHOOL_TYPE');
        $arr;
        foreach($books as $book) {
            $arr[] = $book;
        }
        echo json_encode($arr);
    }

    if(isset($_POST["text"]) && $_POST["text"]=="schoolCity"){
        $books = R::getAll( 'SELECT * FROM ABT_LOC_LOCALITY');
        $arr;
        foreach($books as $book) {
            $arr[] = $book;
        }
        echo json_encode($arr);
    }
    
    






        
?>