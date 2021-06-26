<?php
    $movie_id = $_GET['id'];
    // echo $movie_id;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        img {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: 250px;
            height: 200px;
        }

        ul.ba {
            list-style-type: none;
        }

        li {
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: x-large;
        }

        #titl {
            font-weight: bold;
        }

        #apiDiv {
            border: dashed 2px #CCC;
            padding: 10px;
            padding-left: 20px;


        }

        #apiDiv #message {
            padding-top: 10px;
            align-items: center;
        }

        p {
            font-size: xx-large;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
        <div id="apiDiv">
            <div id="message">
            </div>
            <!-- <button class="btn btn-primary" onclick="loadData()">Load More</button> -->
        </div>

    </div>
    
</body>
</html>
<script>
    var movie_id = <?php echo $movie_id?> 
    getinfo();
    function getinfo() {
            
            $.ajax({
                url: `https://api.themoviedb.org/3/movie/${movie_id}?api_key=ffc4e23618d62c1f9b865e732e5ecfcf&language=en-US`,
                dataType: "JSON",
                success: function (results) {
                    var data = results;
                    console.log(data);
                    var resultHtml = $("<div><p>Movies Detail</p>");
                    
                        var back = "https://image.tmdb.org/t/p/original" + data.backdrop_path;
                        var image = "https://image.tmdb.org/t/p/original" + data.poster_path;
                        var title = data.original_title;
                        var desc = data.overview;
                        var popularity = data.popularity;
                        var language = data.original_language;
                        var releasedate = data.release_date
                        // var id = data[index].id;

                        resultHtml.append("<div>" + "<ul class=\"ba\">" + "<li><img src=\"" + image + "\" /><li>"  + "<li><img src=\"" + back + "\" /><li>"  +  "<li id=\"titl\">" + title + "</a></li>" + "<li> Language : " + language + "</li>" + "<li> Overview : " + desc + "</li>" + "<li> Release Date : " + reformatDate(releasedate) + "</li>" + "<li> popularity : " + popularity + "</li></ul></div>")
                        // console.log(image);
                    



                    resultHtml.append("</div>");
                    $("#message").html(resultHtml);
                    // loading.classList.remove('show');
                    // console.log(data);
                }
            });
        }


    function reformatDate(releasedate) {
        dArr = releasedate.split("-"); 
        return dArr[2] + "/" + dArr[1] + "/" + dArr[0]; 
    }




</script>