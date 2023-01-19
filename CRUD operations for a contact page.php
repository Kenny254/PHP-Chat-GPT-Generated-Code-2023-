<?php
<form method="POST" action="submit_form.php">
    <button type="submit" class="toggle-button <?php echo $status ? 'active' : ''; ?>" name="toggle">
        <?php echo $status ? 'On' : 'Off'; ?>
    </button>
</form>

<script>
    var toggleButton = document.querySelector('.toggle-button');
    toggleButton.addEventListener('click', function() {
        this.classList.toggle('active');
        this.innerHTML = this.innerHTML === 'On' ? 'Off' : 'On';
    });
</script>

<?php
    $status = false; //default status
    if(isset($_POST['toggle'])) {
        $status = !$status;
        $conn = new mysqli("host", "username", "password", "database");
        $conn->query("UPDATE table SET status='$status' WHERE id=1");
    }
?>

?>
