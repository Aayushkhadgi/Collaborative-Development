<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "Trek_Management";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch data from the database
function fetchData($conn, $tableName) {
    $sql = "SELECT * FROM $tableName";
    $result = $conn->query($sql);
    $data = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}


// Fetch include/exclude data
$includeExcludeData = fetchData($conn, "Include_Exclude1");

// Fetch map data
$sql = "SELECT * FROM map1";
$result = $conn->query($sql);
$mapData = $result->fetch_assoc();

// Close database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="AC.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="slide1">
            
            <div class="panel1">
                <h1> Annapurna Circuit Trek </h1>
            <div class="logo-container">
                <div class="logo-row">
                    <div class="logo-item">
                        <img src="location.png" alt="Logo 1">
                        <div class="logo-details">
                            <h3>Location</h3>
                            <p>Kaski,Nepal</p>
                        </div>
                    </div>
                
                    <div class="logo-item">
                            <img src="accomodation.png" alt="Logo 2">
                            <div class="logo-details">
                                <h3>Accomodation</h3>
                                <p>Hotels, Lodges</p>
                            </div>
                        </div>
                
                    <div class="logo-item1">
                                <img src="grade.png" alt="Logo 3">
                                <div class="logo-details">
                                    <h3>Grade</h3>
                                    <p>Challenging</p>
                                </div>
                            </div>
                
                    <div class="logo-item">
                                    <img src="duration.png" alt="Logo 4">
                                    <div class="logo-details">
                                        <h3>Duration</h3>
                                        <p>14-15 days</p>
                                    </div>
                                </div>
                </div>

                <!------------------second-row--------------->
                <div class="logo-row">
                    <div class="logo-item">
                        <img src="daily-activity.png" alt="Logo 5">
                        <div class="logo-details">
                            <h3>Daily activity</h3>
                            <p>4-6 hrs</p>
                        </div>
                    </div>
                    <div class="logo-item">
                        <img src="max-altitude.png" alt="Logo 6">
                        <div class="logo-details">
                            <h3>Max-altitude</h3>
                            <p>4130 m
                            </p>
                        </div>
                    </div>
                    <div class="logo-item">
                        <img src="season.png" alt="Logo 7">
                        <div class="logo-details">
                            <h3>Best time</h3>
                            <p>Spring,
                                Autumn
                            </p>
                        </div>
                    </div>
                    <div class="logo-item2">
                        <img src="transportation.png" alt="Logo 8">
                        <div class="logo-details">
                            <h3>Transportation</h3>
                            <p>Flight, Jeep</p>
                        </div>
                    </div>
                </div>
                
            </div>
            </div>
        </div>

        <!-------------slide-2------------->

        <div class="slide2">
            <div class="button">

                <div class="button1">
                    <button id="trekButton">
                        <img src="itenary.png" alt="Logo 1">
                        <span>Trek Itinerary</span>
                    </button>
                </div>
        
                <div class="button2">
                    <button id="includeExcludeButton">
                        <img src="include.png" alt="Logo 2">
                        <span>Include/Exclude</span>
                    </button>
                </div>
                <div class="button3">
                    <button id="mapButton">
                        <img src="map.png" alt="Logo 3">
                        <span>map</span>
                    </button>
                </div>
                <div class="button4">
    <a href="book.html">
        <button id="shopButton">
            <img src="file.png" alt="Logo 4">
            <span>Book</span>
        </button>
    </a>
</div>
            </div>
            <div id="trekPanel" class="panel">
                <h1> Your Daily Schedule</h1>
               <div class="onepan">
                <p> 
            *       Day 01<br> Arrival In Tribhuvan International Airport, Kathmandu and transfer to Hotel<br>
            *       Day 02<br> Fly to Pokhara and drive to Syauli Bazzar and trek to Ghandruk<br>
            *       Day 03<br> Trek from Ghandruk to Chhomrong <br>
            *       Day 04<br> Trek from Chhomrong to Dovan<br>
            *       Day 05<br> Trek from Dovan to Macchapuchre Base Camp (MBC)<br>
            *       Day 06<br> Trek from Macchapuchre Base Camp (MBC) to Annapurna Base Camp (ABC); explore Annapurna South Basecamp <br>
            
                </p>
  
               </div>
               <div class="twopan">
                <p> *       Day 07<br> Early morning sunrise view on Annapurna range and trek back to Bamboo<br>
                    *       Day 08<br> Trek from Bamboo to Jhinu Danda; Visit Jhinu Danda Hot Spring<br>
                    *       Day 09<br> Trek from Jhinu Danda to Siwai and drive back to Pokhara; transfer to Hotel<br>
                    *       Day 10<br> Leisure day in Pokhara; Sightseeing in Pokhara city <br>
                    *       Day 11<br> Fly back to Kathmandu and transfer to Hotel; free day<br>
                    *       Day 12<br> Final departure<br>
                   
                     </p>

               </div>
               
            </div>
        
            <div id="includeExcludePanel" class="panel">
                <div class="pan1">
                    <h1>Included</h1>
                    <p>
                        <?php foreach ($includeExcludeData as $item): ?>
                            <?php if ($item['category'] === 'Included'): ?>
                                <?php echo $item['details']; ?><br>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </p>
                </div>
                <div class="pan2">
                    <h1>Not-included</h1>
                    <p>
                        <?php foreach ($includeExcludeData as $item): ?>
                            <?php if ($item['category'] === 'Not-included'): ?>
                                <?php echo $item['details']; ?><br>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </p>
                </div>
            </div>
            <div id="mapPanel" class="panel">
                <div class="content">
                    <p><?php echo isset($mapData['description']) ? $mapData['description'] : ''; ?></p>
                </div>
                <!-- Content for trek itinerary panel -->
                <img src="<?php echo isset($mapData['map_image']) ? $mapData['map_image'] : ''; ?>" alt="Everest map">
            </div>
        </div>
    </div>
    <script src="AC.js"></script>

</body>
</html>