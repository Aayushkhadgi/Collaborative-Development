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
$includeExcludeData = fetchData($conn, "Include_Exclude2");

// Fetch map data
$sql = "SELECT * FROM map2";
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
    <link rel="stylesheet" href="LV.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="slide1">
            
            <div class="panel1">
                <h1> Langtang Valley Trek</h1>
            <div class="logo-container">
                <div class="logo-row">
                    <div class="logo-item">
                        <img src="location.png" alt="Logo 1">
                        <div class="logo-details">
                            <h3>Location</h3>
                            <p>Rasuwa,Nepal</p>
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
                                        <p>10-12 days</p>
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
                            <p>4985 m
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
            *       Day 02<br> DRIVE TO SYABRU BESI, 8 hours drive to Syabru Besi. After driving for 30km, we approach pristine villages on the banks of the river Trishuli.<br>
            *       Day 03<br> TREK TO LAMA HOTEL, start our trek by traversing the ridge on Syabru Besi's main road and soon reach Ghopcha Khola. we will cross to the north bank of the Langtang Khola amid the spectacular vistas of cascading waterfalls. On reaching 2748 metres, we arrive at Lama Hotel where we will spend the night.<br>
            *       Day 04<br> TREK TO LANGTANG VILLAGE, we ascend above the Langtang Khola where the trail becomes steeper. From here we can see the beautiful Langtang Lirung rising up to 7246m. <br>
            *       Day 05<br> TREK TO KYANGJIN, Today, the trail skirts gradually through rich yak pastures and interesting traditional villages of Muna and Singdun. We cross a wooden cantilever bridge and reach a wide valley after climbing across the glacial moraine. Finally, we climb up through the mountain pass to reach Kyangjin Gompa where there is a small monastery and a cheese factory.<br>
            
            
                </p>
  
               </div>
               <div class="twopan">
                <p> *       Day 06<br> EXPLORATION OF KYANGJIN, The furthest point of our trek, we will spend the day in Kyangjin where you will get the opportunity to explore the ancient monastery and cheese factory and just generally soak up the atmosphere. If you are feeling strong you can choose to climb Kyangjin Ri (4600m) from where you will get amazing views of the snow-capped peaks and glaciers.<br>
                    *       Day 07<br> TREK TO LAMA HOTEL, From Kyangjin, we take the route back to Lama Hotel. As we retrace our steps, we follow the Langtang Khola to Langtang village and on to Ghora Tabela. We stop briefly for lunch and thereafter continue the steep descent to Lama Hotel.<br>
                    *       Day 08<br> TREK TO SYABRU BESI, From Lama Hotel, we head back to Syabru Besi where we will have the opportunity to get an insight into the ancient culture and customs of the Tamang community.<br>
                    *       Day 09<br> DRIVE TO KATHMANDU, Today we will drive back to Kathmandu. You stay overnight in a hotel in Kathmandu.<br>
                    *       Day 10<br> DEPARTURE FROM KATHMANDU, We will collect you from your hotel and transfer you to Kathmandu Airport for your departing flight.<br>
                    
                    
                     </p>

               </div>
               
            </div>
        
            <div id="includeExcludePanel" class="panel">
                <div class="pan1">
                    <h1>Included</h1>
                    <p>
                        <?php foreach ($includeExcludeData as $item): ?>
                            <?php if ($item['title'] === 'Included'): ?>
                                <?php echo $item['content']; ?><br>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </p>
                </div>
                <div class="pan2">
                    <h1>Not-included</h1>
                    <p>
                        <?php foreach ($includeExcludeData as $item): ?>
                            <?php if ($item['title'] === 'Not-included'): ?>
                                <?php echo $item['content']; ?><br>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </p>
                </div>
            </div>
            <div id="mapPanel" class="panel">
                <div class="content">
                    <p><?php echo isset($mapData['content']) ? $mapData['content'] : ''; ?></p>
                </div>
                <!-- Content for trek itinerary panel -->
                <img src="<?php echo isset($mapData['image_url']) ? $mapData['image_url'] : ''; ?>" alt=" map">
            </div>
        </div>
    </div>
    <script src="LV.js"></script>

</body>
</html>
