    <section class="main-container">
        <div class="main-wrapper">
            <h2>Home HI THIS IS INDEX</h2>
            <?php
                if(isset($_SESSION['username'])){
                    echo "Welcome, ".$_SESSION['first_name'];
                }
            ?>
        </div>
    </section>
<?php 
    include_once "header.php";
?>

<?php
    include_once "footer.php";

?>
