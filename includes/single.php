<?php
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    require_once 'database.php';
    
    $sql = "SELECT * FROM listings WHERE id = ?";
    
    if($stmt = mysqli_prepare($connection, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        $param_id = trim($_GET["id"]);
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
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

                echo ("
                    <div class=job-single>
		            	<main class=job-main>
		            		<div class=job-card>
		            			<div class=job-primary>
		            				<header class=job-header>
		            					<h2 class=job-title><a href=#>$title</a></h2>
		            					<div class=job-meta>
		            						<a class=meta-company href=#>$company</a>
		            						<span class=meta-date>Posted on $createdOn</span>
		            					</div>
		            					<div class=job-details>
		            						<span class=job-location>$location</span>
		            						<span class=job-type>$type</span>
		            					</div>
		            				</header>

		            				<div class=job-body>
		            					<p>$description</p>
		            					<h3>Responsibilities</h3>
		            					<p>$responsibilities</p>
		            				</div>
		            			</div>
		            		</div>
		            	</main>
		            	<aside class=job-secondary>
		            		<div class=job-logo>
		            			<div class=job-logo-box>
		            				<img src=$logo alt=no pic>
		            			</div>
		            		</div>
		            		<a href=# class=button button-wide>Apply now</a>
		            	</aside>
		            </div>
                ");
            } else{
                header("location: ../index.php?error=InvalidId");
                exit();
            }
        }
    }
    
    
    //other related jobs by location

    $sql = "SELECT * FROM listings WHERE location = ?";
    
    if($stmt = mysqli_prepare($connection, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_related);
        
        $param_related = trim($_GET["related"]);
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) > 0){
                $data = "";
                $cards = array();

                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                
                $idR = $row["id"];
                $titleR = $row["title"];
                $descriptionR = $row["description"];
                $companyR = $row["company"];
                $salarR = $row["salary"];
                $logoR = $row["logo"];
                $locationR = $row["location"];
                $typeR = $row["type"];
                $responsibilitiesR = $row["responsibilities"];
                $createdOnR = $row["createdOn"];

                if($param_id == $idR){
                    continue;
                }

                $cards = array();
                $temp = "
                <li class=job-card>
				    <div class=job-primary>
					    <h2 class=job-title><a href=showSingle.php?id=${idR}&related=${locationR}>$titleR</a></h2>
					    <div class=job-meta>
					    	<a class=meta-company href=showSingle.php?id=${idR}&related=${locationR}>$companyR</a>
					    	<span class=meta-date>Posted on $createdOnR</span>
					    </div>
					    <div class=job-details>
					    	<span class=job-location>$locationR</span>
					    	<span class=job-type>$typeR</span>
					    </div>
				    </div>
				    <div class=job-logo>
					    <div class=job-logo-box>
					    	<img src=$logoR alt=no pic>
					    </div>
				    </div>
			    </li>";
                array_push($cards, $temp);
            }

            $data = implode("", $cards);
            if (empty($data)) {
                echo ("<h2 class=section-heading>Other related jobs at your location:</h2>
                        <ul class=jobs-listing>" . "No related jobs!" . "</ul>");
            } else {
                echo ("<h2 class=section-heading>Other related jobs at your location:</h2>
                        <ul class=jobs-listing>" . $data . "</ul>");
            }

            } else{
                echo "No results found!";
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    mysqli_stmt_close($stmt);
    
    mysqli_close($connection);
} else{
    header("location: ../index.php?error=InvalidId");
    exit();
}
?>

