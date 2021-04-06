<?php
    require_once 'includes/header.php';
?>

<h2>Create Job listing</h2>
<p>Please fill this form and submit to add job record to the database.</p>
<form action="includes/checkcreate.php" method="post">
    <div>
        <label>Title</label>
        <input type="text" name="title">
    </div>
    <div >
        <label>Description</label>
        <textarea name="description"></textarea>
    </div>
    <div>
        <label>Company</label>
        <input type="text" name="company">
    </div>
    <div>
        <label>Salary</label>
        <input type="text" name="salary">
    </div>
    <div>
        <label>Logo</label>
        <input type="text" name="logo">
    </div>
    <div>
        <label>Location</label>
        <input type="text" name="location">
    </div>
    <div>
        <label>Job type</label>
        <input type="text" name="type">
    </div>
    <div >
        <label>Responsibilities</label>
        <textarea name="responsibilities"></textarea>
    </div>
        <input type="submit" value="Submit">
        <a href="index.php">Cancel</a>
</form>

<?php
require_once 'includes/footer.php';
?>