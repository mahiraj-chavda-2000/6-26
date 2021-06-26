<?php
    $movie_id = $_GET['id'];
    // echo $movie_id;
    // header('Location: moviedb.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recive</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <script>
    var movie_id = <?php echo $movie_id; ?>;
    postValue(movie_id);
    function postValue(id) {
        


        var data1 = JSON.stringify({
            "name": id,
            "iso_639_1": "en"



        });


        var settings = {
            "async": true,
            "crossDomain": true,
            "url": "https://api.themoviedb.org/4/list?api_key=ffc4e23618d62c1f9b865e732e5ecfcf",
            "method": "POST",
            "headers": {
                "authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJmZmM0ZTIzNjE4ZDYyYzFmOWI4NjVlNzMyZTVlY2ZjZiIsImp0aSI6IjMyMDAzMDYiLCJzY29wZXMiOlsiYXBpX3JlYWQiLCJhcGlfd3JpdGUiXSwic3ViIjoiNjBkNDExODI5MjRjZTYwMDdmOGUwOGNmIiwidmVyc2lvbiI6MSwibmJmIjoxNjI0NjE2ODgxfQ.jMWW70VUlsEnaOSO2VBbhqSa4g7Y5PdUk5sq7vJ5n4s",
                "content-type": "application/json;charset=utf-8"
            },
            "processData": false,
            "data": `${data1}`
        }

        $.ajax(settings).done(function(response) {

            var moviedata = response;
            var mid = moviedata.id;
            console.log(mid);

            var settings1 = {
                "async": true,
                "crossDomain": true,
                "url": `https://api.themoviedb.org/4/list/${mid}?api_key=ffc4e23618d62c1f9b865e732e5ecfcf&page=1`,
                "method": "GET",
                "headers": {
                    "content-type": "application/json;charset=utf-8",
                    "authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJmZmM0ZTIzNjE4ZDYyYzFmOWI4NjVlNzMyZTVlY2ZjZiIsImp0aSI6IjMyMDAzMDYiLCJzY29wZXMiOlsiYXBpX3JlYWQiLCJhcGlfd3JpdGUiXSwic3ViIjoiNjBkNDExODI5MjRjZTYwMDdmOGUwOGNmIiwidmVyc2lvbiI6MSwibmJmIjoxNjI0NjE2ODgxfQ.jMWW70VUlsEnaOSO2VBbhqSa4g7Y5PdUk5sq7vJ5n4s"
                },
                "processData": false,
                "data": "{}"
            }

            $.ajax(settings1).done(function(response) {
                // console.log(response.name);
                var a = parseInt(response.name);
                // console.log(a);
                getData();
                window.location.href = `info.php?id=${a}`;

                function getData() {

                    $.ajax({
                        url: `https://api.themoviedb.org/3/movie/${a}?api_key=ffc4e23618d62c1f9b865e732e5ecfcf&language=en-US`,
                        dataType: "JSON",
                        success: function(results) {
                            var data = results;
                            // var resultHtml = $("<div><p>Movies</p>");
                            // for (let index = 0; index < data.length; index++) {

                            //     var image = "https://image.tmdb.org/t/p/original" + data[index]
                            //         .poster_path;
                            //     var title = data[index].original_title;
                            //     var desc = data[index].overview;
                            //     var popularity = data[index].popularity;
                            //     var language = data[index].original_language;
                            //     var id = data[index].id;

                            //     resultHtml.append("<div>" +
                            //         "<p id=\"titl\"> <a href=\"favourite.php?id=" + id +
                            //         "\" >" + "Favourite" + "</a></p>" +
                            //         "<p id=\"titl\"> <a href=\"recive.php?id=" + id +
                            //         "\" >" + "Add To Favourite" + "</a></p>" +
                            //         "<ul class=\"ba\">" + "<li><img src=\"" + image +
                            //         "\" /></a><li>" +
                            //         "<li id=\"titl\">    <a href=\"info.php?id=" + id +
                            //         "\" >" + title + "</a></li>" + "<li> Language : " +
                            //         language + "</li>" + "<li> Overview : " + desc +
                            //         "</li>" + "<li> popularity : " + popularity +
                            //         "</li></ul></div>")
                            //     // console.log(image);
                            // }
                            // resultHtml.append("</div>");
                            // $("#message").html(resultHtml);
                            // loading.classList.remove('show');
                            console.log(data);
                        }
                    });
                }


            });




        });
    }
    </script>

</body>

</html>