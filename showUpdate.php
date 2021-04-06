<?php 
    require_once 'includes/header.php';
?>

<?php 
    require_once 'includes/update.php';
?>

    <h2 class="mt-5">Update Record</h2>
    <p>Please edit the input values and submit to update the job record.</p>
    <form action="includes/update.php" method="post">
        <div>
            <label>Title</label>
            <input type="text" name="title" value="<?php echo $title; ?>">
        </div>
        <div>
            <label>Description</label>
            <textarea name="description"><?php echo $description; ?></textarea>
        </div>
        <div>
            <label>Company</label>
            <input type="text" name="company" value="<?php echo $company; ?>">

        </div>    
        <div>
            <label>Salary</label>
            <input type="text" name="salary" value="<?php echo $salary; ?>">
        </div>
        <div>
            <label>Logo</label>
            <input type="text" name="logo" value="<?php echo $logo; ?>">
        </div>
        <div>
            <label>Job location</label>
            <input type="text" name="location" value="<?php echo $location; ?>">
        </div>
        <div>
            <label>Type</label>
            <input type="text" name="type" value="<?php echo $type; ?>">
        </div>
        <div>
            <label>Responsibilities</label>
            <textarea name="responsibilities"><?php echo $responsibilities; ?></textarea>
        </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
            <input type="submit" value="Update">
            <a href="showEdit.php">Cancel</a>
    </form>

<?php 
    require_once 'includes/footer.php';
?>