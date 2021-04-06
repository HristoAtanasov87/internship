<?php
	require 'database.php';

	$query = $_GET['query']; 
	
	$raw_results = mysqli_query($connection, "SELECT * FROM listings
		WHERE (`title` LIKE '%".$query."%')") or die(mysqli_error());
		
		
	if(mysqli_num_rows($raw_results) > 0){
		$data = "";
        $cards = array();

		while($results = mysqli_fetch_array($raw_results)){
			
		$id = $results["id"];
        $title = $results["title"];
        $description = $results["description"];
        $company = $results["company"];
        $salary = $results["salary"];
        $logo = $results["logo"];
        $location = $results["location"];
        $type = $results["type"];
        $responsibilities = $results["responsibilities"];
        $createdOn = $results["createdOn"];

        $temp = "
        <li class=job-card>
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
    } else{ // if there is no matching rows do following
		echo "No results";
	}
	
?>