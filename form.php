<?php
include("connect.php");
$pdo = Database::DatabaseConnection();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Game Publishing</title>

    <link rel="icon" href="res/images/KLTL Logo.png">

    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/form.css" />
</head>

<body>
    <div class="container-fluid">
        <div class="box-container">
            <div class="container">
                <form class="needs-validation" novalidate action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                    <div class="row g-4">

                        <div class="col-md-12 text-center">
                            <h1>Game Publishing</h1>

                        </div>

                        <!-- Game Information -->
                        <div class="info-container">

                            <h3>Game Information</h3>

                            <div class="row g-4">

                                <div class="row g-4">

                                    <!-- Game Title -->
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="txtGameTitle" required
                                                placeholder="-" />
                                            <label for="floatingInput">Game Title</label>
                                            <div class="invalid-feedback">Game Title is required</div>
                                        </div>
                                    </div>

                                    <!-- Game Genre -->
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input list="data" class="form-control" name="txtGameGenre" required placeholder="-" />

                                            <datalist id="data">
                                                <option value="Action">Action</option>
                                                <option value="Adventure">Adventure</option>
                                                <option value="RPG">RPG</option>
                                                <option value="Simulation"></option>
                                                <option value="Strategy"></option>
                                            </datalist>

                                            <label for="floatingInput">Game Genre</label>
                                            <div class="invalid-feedback">Game Genre is required</div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row g-4">

                                    <!-- Game Release Date -->
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="datetime-local" class="form-control" name="txtDateRelease" required
                                                placeholder="-" />
                                            <label for="floatingInput">Date Release</label>
                                            <div class="invalid-feedback">Game Release Date is required</div>
                                        </div>
                                    </div>

                                    <!-- Game Play Time -->
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" name="txtPlayNum" required
                                                placeholder="-" />
                                            <label for="floatingInput">Game Play Time</label>
                                            <div class="invalid-feedback">Game Play Time is required</div>
                                        </div>
                                    </div>

                                    <!-- Time -->
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                            <select class="form-select" name="txtTime" required
                                                aria-label="Floating label select example">
                                                <option selected disabled value="">Select Time</option>
                                                <option value="Minutes">Minutes</option>
                                                <option value="Hours">Hours</option>

                                            </select>
                                            <label for="floatingInput">Time</label>
                                            <div class="invalid-feedback">Game Play Time is required</div>
                                        </div>
                                    </div>

                                </div>

                                <!-- Game Description -->
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <textarea id="GameDescription" class="form-control vh-25" name="txtGameDescription" required placeholder="-"></textarea>

                                        <label for="floatingInput">Game Description</label>
                                        <div class="invalid-feedback">Game Description is required</div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <!-- Game Upload -->
                        <div class="info-container">

                            <h3>Game Upload</h3>

                            <div class="row">

                                <!-- Game Icon -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-6">
                                        <input type="file" class="form-control" required name="txtIcon" required
                                            placeholder="-">
                                        <label for="floatingInput">Game Icon</label>
                                        <div class="invalid-feedback">Game Icon is required</div>
                                    </div>
                                </div>

                                <!-- Game File -->
                                <div class="col-md-6">
                                    <div class="form-floating flex-column">
                                        <input type="file" multiple class="form-control" required name="txtGameFile"
                                            required placeholder="-">
                                        <label for="floatingInput">Game File</label>
                                        <div class="invalid-feedback">Game File is required</div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <!-- Developer Info -->
                        <div class="info-container">

                            <h3>Web Links</h3>

                            <div class="row">

                                <!-- Facebook -->
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="url" class="form-control" name="FBLink" required placeholder="-" />
                                        <label for="floatingInput">FB Page</label>
                                        <div class="invalid-feedback">URL is required</div>
                                    </div>
                                </div>

                                <!-- Youtube -->
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="url" class="form-control" name="YoutubeLink" required placeholder="-" />
                                        <label for="floatingInput">Youtube Channel</label>
                                        <div class="invalid-feedback">URL is required</div>
                                    </div>
                                </div>

                                <!-- Instagram -->
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="url" class="form-control" name="InstagramLink" required placeholder="-" />
                                        <label for="floatingInput">Instagram Page</label>
                                        <div class="invalid-feedback">URL is required</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <!-- Button -->
                    <div class="col-md-3 mx-auto ">
                        <button class="btn btn-primary form-control" id="btnSubmit" type="submit">Publish Game</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</body>

</html>


<script type="text/javascript" src="js/form.js"></script>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    ManageRecord("ADD", "1010");
}

ManageRecord("EDIT", "1010");

function ManageRecord($query, $id)
{
    switch ($query) {
        case "ADD":
            AddData($id);
            break;
        case "EDIT":
            EditData($id, 
                    "Genshin",
                    "Ation",
                    "2021-10-10", 
                    "100", 
                    "Hours", 
                    "Free to Play", 
                    "res/images/KLTL Logo.png", 
                    "res/images/KLTL Logo.png", 
                    "https://www.facebook.com/", 
                    "https://www.youtube.com/", 
                    "https://www.instagram.com/");
            break;
        case "DELETE":
            DeleteRecord($id);
            break;
    }
}

// -- CREATE --
function AddData($IDnum)
{
    $ID = (isset($_POST['ID'])) ? $_POST['ID'] : $IDnum;
    $GameTitle = (isset($_POST['txtGameTitle'])) ? $_POST['txtGameTitle'] : "";
    $GameGenre = (isset($_POST['txtGameGenre'])) ? $_POST['txtGameGenre'] : "";
    $DateRelease = (isset($_POST['txtDateRelease'])) ? $_POST['txtDateRelease'] : "";
    $GamePlayTime = (isset($_POST['txtPlayNum'])) ? $_POST['txtPlayNum'] : "";
    $Time = (isset($_POST['txtTime'])) ? $_POST['txtTime'] : "";
    $GameDescription = (isset($_POST['txtGameDescription'])) ? $_POST['txtGameDescription'] : "";
    $GameIcon = (isset($_POST['txtIcon'])) ? $_POST['txtIcon'] : "";
    $GameFile = (isset($_POST['txtGameFile'])) ? $_POST['txtGameFile'] : "";
    $FBLink = (isset($_POST['FBLink'])) ? $_POST['FBLink'] : "";
    $YoutubeLink = (isset($_POST['YoutubeLink'])) ? $_POST['YoutubeLink'] : "";
    $InstagramLink = (isset($_POST['InstagramLink'])) ? $_POST['InstagramLink'] : "";

    $sql = "INSERT INTO mytabless 
    (
        ID,
        GameTitle,
        ReleaseDate,
        GameGenre,
        GamePlayTime,
        Horology_Time,
        GameDescription,
        GameIcon,
        GameFile,
        FBLink,
        YTLink,
        InstaLink
    )
    VALUES
    (
        '$ID',
        '$GameTitle',
        '$DateRelease',
        '$GameGenre',
        '$GamePlayTime',
        '$Time',
        '$GameDescription',
        '$GameIcon',
        '$GameFile',
        '$FBLink',
        '$YoutubeLink',
        '$InstagramLink'
    )";
    Database::ManageRecord($GLOBALS['pdo'], $sql);
    echo "The data has been saved";
}

// -- UPDATE --
function EditData($iD, $gameTitle, $gameGenre, $dateRelease, $gamePlayTime, $time, $gameDescription, $gameIcon, $gameFile, $fBLink, $youtubeLink, $instagramLink)
{

    $ID = (isset($_POST['ID'])) ? $_POST['ID'] : $iD;
    $GameTitle = (isset($_POST['txtGameTitle'])) ? $_POST['txtGameTitle'] : $gameTitle;
    $GameGenre = (isset($_POST['txtGameGenre'])) ? $_POST['txtGameGenre'] : $gameGenre;
    $DateRelease = (isset($_POST['txtDateRelease'])) ? $_POST['txtDateRelease'] : $dateRelease;
    $GamePlayTime = (isset($_POST['txtPlayNum'])) ? $_POST['txtPlayNum'] : $gamePlayTime;
    $Time = (isset($_POST['txtTime'])) ? $_POST['txtTime'] : $time;
    $GameDescription = (isset($_POST['txtGameDescription'])) ? $_POST['txtGameDescription'] : $gameDescription;
    $GameIcon = (isset($_POST['txtIcon'])) ? $_POST['txtIcon'] : $gameIcon;
    $GameFile = (isset($_POST['txtGameFile'])) ? $_POST['txtGameFile'] : $gameFile;
    $FBLink = (isset($_POST['FBLink'])) ? $_POST['FBLink'] : $fBLink;
    $YoutubeLink = (isset($_POST['YoutubeLink'])) ? $_POST['YoutubeLink'] : $youtubeLink;
    $InstagramLink = (isset($_POST['InstagramLink'])) ? $_POST['InstagramLink'] : $instagramLink;

    $sql = "UPDATE mytabless 
        SET GameTitle = '$GameTitle',
            ReleaseDate = '$DateRelease',
            GameGenre = '$GameGenre',
            GamePlayTime = '$GamePlayTime',
            Horology_Time = '$Time',
            GameDescription = '$GameDescription',
            GameIcon = '$GameIcon',
            GameFile = '$GameFile',
            FBLink = '$FBLink',
            YTLink = '$YoutubeLink',
            InstaLink = '$InstagramLink'
        WHERE ID = '$ID'";

    Database::ManageRecord($GLOBALS['pdo'], $sql);
    echo "The data has been edited";
}

// -- DELETE --
function DeleteRecord($IDnum)
{
    $ID = (isset($_POST['ID'])) ? $_POST['ID'] : $IDnum;

    $sql = "delete from mytabless
            where ID = '$ID'";
    Database::ManageRecord($GLOBALS['pdo'], $sql);
    echo 'Deleted Record';
}

?>