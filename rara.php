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
$includeExcludeData = fetchData($conn, "Include_Exclude5");

// Fetch map data
$sql = "SELECT * FROM map5";
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
    <link rel="stylesheet" href="rara.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="slide1">
            
            <div class="panel1">
                <h1> Rara Lake Trek</h1>
            <div class="logo-container">
                <div class="logo-row">
                    <div class="logo-item">
                        <img src="location.png" alt="Logo 1">
                        <div class="logo-details">
                            <h3>Location</h3>
                            <p>Jumla/Mugu,Nepal</p>
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
                                        <p>16-17 days</p>
                                    </div>
                                </div>
                </div>

                <!------------------second-row--------------->
                <div class="logo-row">
                    <div class="logo-item">
                        <img src="daily-activity.png" alt="Logo 5">
                        <div class="logo-details">
                            <h3>Daily activity</h3>
                            <p>6-7 hrs</p>
                        </div>
                    </div>
                    <div class="logo-item">
                        <img src="max-altitude.png" alt="Logo 6">
                        <div class="logo-details">
                            <h3>Max-altitude</h3>
                            <p>2,990 m
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
            *       Day 01<br> ARRIVE IN KATHMANDU, All trekkers need to organise their own flights to Kathmandu International Airport (KTM). From Kathmandu Airport we will arrange a private transfer to your hotel. That night you will meet your local Kandoo representative and have a full pre-trek briefing.<br>
            *       Day 02<br> Half day sightseeing tour of Kathmandu. Hotel Accommodation.<br>
            *       Day 04<br> Fly from Kathmandu to Nepalgunj (150 m/490 ft) 1 hr, Hotel Accommodation. <br>
            *       Day 05<br> Fly from Nepalgunj to Jumla (2,540 m/8,334 ft) 20 minutes, Tea House Accommodation.<br>
            *       Day 06<br> Trek from Jumla to Chere Chaur (3055 m/10,023 ft) Tea House Accommodation<br>
            *       Day 07<br>  Chere Chaur to Chalachaur (2980 m/9,777 ft) 5-6 hrs, Tea House Accommodation.<br>
            
            
                </p>
  
               </div>
               <div class="twopan">
                <p> 
                    *       Day 08<br> Chalachaur to Sinja Valley (2490 m/ 8167 ft) Tea House Accommodation.<br>
                    *       Day 09<br>Sinja to Ghorosingha (3050 m/10007 ft) Tea House Accommodation.<br>
                    *       Day 10<br>Ghorosingha to Rara Lake (3010 m/9876 ft) 6-7 hrs, Tea House Accommodation.<br>
                    *       Day 11<br> Explore Rara Lake to explore the beauty of the lake and backdrop of the lake, communicate with the local people and learn their culture and ethnicity in detail. Tea House Accommodation.<br>
                    *       Day 12<br>Rara Lake to Pina (2440 m/ 8006 ft) 4-5 hrs, Tea House Accommodation.<br>
                    *       Day 13<br>Trek ends: Bumra to Jumla (2540 m/8334 ft) 5-6 hrs, Tea House Accommodation.<br>
                    *       Day 14<br>Fly to Nepalgunj, Fly to Kathmandu, Hotel Accommodation.<br>
                    *       Day 15<br>Final departure<br>

                    
                    
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
                <img src="<?php echo isset($mapData['map_image']) ? $mapData['map_image'] : ''; ?>" alt=" map">
            </div>
        </div>
    </div>



       
    <script src="rara.js"></script>

</body>
</html>
