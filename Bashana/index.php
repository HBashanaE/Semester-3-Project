<!DOCTYPE html>
<html>

<head>
    <title>කුළියට</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</head>

<body>
    <div class="container">
    <h1 align="center">ඔබට අවශ්‍ය ඕනෑම භාණ්ඩයක් පහසුවෙන් කුළියට ගන්න!!! </h1>
    <h2 align="center">ඔබට අවශ්‍ය ඕනෑම භාණ්ඩයක් පහසුවෙන් කුළියට දෙන්න!!!</h2>
    <!-- <form class="form-search" action="search.php" method="GET">
        <input type="text" name="query" />
        <input type="submit" value="Search" />
    </form> -->
</div>
    <section class="search-sec" align="center">
        <div class="container">
            <form action="search.php" method="GET" >
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-3 col-sm-12 p-2">
                                <input type="text" name="query" class="form-control search-slt" placeholder="What do you want?">
                            </div>
                            <!-- <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <input type="text" class="form-control search-slt" placeholder="Enter Drop City">
                            </div> -->
                            <div class="col-lg-3 col-md-3 col-sm-12 p-2">
                                <select class="form-control search-slt" id="exampleFormControlSelect1">
                                    <option>Select Category</option>
                                    <option>Vehicles</option>
                                    <option>Cleaning appliences</option>
                                    <option>Electrical/Electronic</option>
                                    <option>Catering</option>
                                    <option>Building and construction</option>
                                    <option>Other</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-2 ">
                                <!-- <button type="button" value="Search" class="btn btn-primary wrn-btn">Search</button> -->
                                <input type="submit" class="btn btn-info active" value="Search">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>