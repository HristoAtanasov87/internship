<?php 
    require_once "database.php";
    
    $sql = "SELECT * FROM listings";
    $result = mysqli_query($connection, $sql);
    $rowCount = mysqli_num_rows($result);

    if ($rowCount > 0) {
        $data = "";
        $cards = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $title = $row["title"];
            $description = $row["description"];
            $company = $row["company"];
            $salary = $row["salary"];
            $logo = $row["logo"];
            $location = $row["location"];
            $type = $row["type"];
            $responsibilities = $row["responsibilities"];
            $createdOn = $row["createdOn"];

            $temp = "<li class=job-card>
				<div class=job-primary>
					<h2 class=job-title><a href=showSingle.php?id=${id}&related=${location}>$title</a></h2>
					<div class=job-meta>
						<a class=meta-company href=showSingle.php?id=${id}&related=${location}>$company</a>
						<span class=meta-date>Posted on $createdOn</span>
					</div>
					<div class=job-details>
						<span class=job-location>$location</span>
						<span class=job-type>$type</span>
					</div>
				</div>
				<div class=job-logo>
					<div class=job-logo-box>
						<img src=$logo alt=no pic>
					</div>
				</div>
			</li>";
            array_push($cards, $temp);
        }
        $data = implode("", $cards);
        echo ("<ul class=jobs-listing>" . $data . "</ul>");
    } else {
        echo "No results found!";
    }
   
    
?>