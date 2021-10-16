<?php

class Search{

    private $query;

    public function __construct(){

    }

    public function searchQ($query, $category=null){
        include_once('dbh.php');

        $categoryDigit = null;
        switch ($category) {
            case "Vehicles":
                $categoryDigit = '00';
                break;
            case "Cleaning appliences":
                $categoryDigit = '01';
                break;
            case "Electrical/Electronic":
                $categoryDigit = '02';
                break;
            case "Catering":
                $categoryDigit = '03';
                break;
            case "Building and construction":
                $categoryDigit = '04';
                break;
            case "Other":
                $categoryDigit = '99';
                break;
            default:
                $categoryDigit = '100';
        }


        $query = htmlspecialchars($query);
        // changes characters used in html to their equivalents, for example: < to &gt;

        //$query = mysqli_real_escape_string($query);
        // makes sure nobody uses SQL injection
        if($categoryDigit==='100'){
            $sqlQuery = "SELECT * FROM ads WHERE (`title` LIKE '%" . $query . "%') OR (`description` LIKE '%" . $query . "%')";
        }else{
            $sqlQuery = "SELECT * FROM ads WHERE ((`title` LIKE '%" . $query . "%') OR (`description` LIKE '%" . $query . "%')) AND (category='$categoryDigit')";
        }
        

        //$sqlQuery = "SELECT * FROM ads WHERE category= 01";
        
        return $sqlQuery;

    }

    public function renderHTML($sqlQuery){
        // $dbh = new dbh();
        // $db_login = $dbh->connect();
        $db_login = dbh::getDataBase();
        $raw_results = mysqli_query($db_login, $sqlQuery) or die(mysql_error());
        $htmlString = '';
        if (mysqli_num_rows($raw_results) > 0) { // if one or more rows are returned do following

            while ($results = mysqli_fetch_array($raw_results)) {
                $htmlString .= "<div class = 'card mb-3' style='height: 500px; width:90%;'>";
                $htmlString .= "<div class='card-body'>";
                $htmlString .= '<h2 class="card-head">'.$results['title'].'</h2>';
                $htmlString .= "</br>";
                $htmlString .= "<img src='ads/".$results['image']."'class ='card-img-top img-thumbnail' alt = 'Image' style ='width : auto ; height:400px;'>";
                $htmlString .= "<div class='card-body'>";
                // $htmlString .= '<h5 class="card-title">'. $results['title'] .'</h5>';
                $htmlString .= '<pre class="card-text">'. $results['description'] .'</pre>';
                $htmlString .= '<h3 class="card-text">Posted By: '.$results['username'].'</h3>';
                $htmlString .= "</div>";
                $htmlString .= "</div>";
                $htmlString .= "</div>";



                // $htmlString .= "  <div class=\"card-body\">";
                // //$htmlString .= "      <a href='' class='btn btn-primary'>View</a>";
                // $htmlString .= "  </div>";
                // $htmlString .= "</div>";

            }
        } else { 
            $htmlString .= "<h1><br></h1>";
            $htmlString .= "<h1 class='text-danger'>No results found</h1>";
            $htmlString .= "<p class='text-danger'>Please try different category</p>";
        }

        return $htmlString;

    }
    
}