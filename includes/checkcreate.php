<?php
// Include database file
require_once "database.php";

// Define variables and initialize with empty values
$title = $description = $company = $salary = $logo = $location = $type = $responsibility = "";
$title_err = $description_err = $company_err = $salary_err = $logo_err = $location_err = $type_err = $responsibility_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate title
    $input_title = trim($_POST["title"]);
    if(empty($input_title)){
        $title_err = "Please enter a name.";
    } else{
        $title = $input_title;
    }
    
    // Validate description
    $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_err = "Please enter a description.";     
    } else{
        $description = $input_description;
    }

    // Validate company
    $input_company = trim($_POST["company"]);
    if(empty($input_company)){
        $company_err = "Please enter a company.";     
    } else{
        $company = $input_company;
    }
    
    // Validate salary
    $input_salary = trim($_POST["salary"]);
    if(empty($input_salary)){
        $salary_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_salary)){
        $salary_err = "Please enter a positive integer value.";
    } else{
        $salary = $input_salary;
    }

    // Validate logo
    $input_logo = trim($_POST["logo"]);
    if(empty($input_logo)){
        $logo_err = "Please enter a logo URL.";     
    } else{
        $logo = $input_logo;
    }

    // Validate location
    $input_location = trim($_POST["location"]);
    if(empty($input_location)){
        $location_err = "Please enter a job location.";     
    } else{
        $location = $input_location;
    }

    // Validate type
    $input_type = trim($_POST["type"]);
    if(empty($input_type)){
        $type_err = "Please enter a job type.";     
    } else{
        $type = $input_type;
    }

    // Validate responsibilities
    $input_responsibilities = trim($_POST["responsibilities"]);
    if(empty($input_responsibilities)){
        $responsibilities_err = "Please enter a job responsibilities.";     
    } else{
        $responsibilities = $input_responsibilities;
    }

    $createdOn = date("d/m/Y");
    
    // Check input errors before inserting in database
    if(empty($title_err) && empty($description_err) && empty($company_err) && empty($salary_err) && empty($logo_err) && empty($location_err) && empty($type_err) && empty($responsibilities_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO listings (title, description, company, salary, logo, location, type, responsibilities, createdOn) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_title, $param_description, $param_company, $param_salary, $param_logo, $param_location, $param_type, $param_responsibilities, $param_createdOn);
            
            // Set parameters
            $param_title = $title;
            $param_description = $description;
            $param_company = $company;
            $param_salary = $salary;
            $param_logo = $logo;
            $param_location = $location;
            $param_type = $type;
            $param_responsibilities = $responsibilities;
            $param_createdOn = $createdOn;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: ../index.php?success=createdListing");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        header("location: ../showCreate.php?error=emptyFields");
    }
    
    // Close connection
    mysqli_close($connection);
}

?>

