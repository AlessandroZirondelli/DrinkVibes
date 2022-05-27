<div class="container">
    <h2 class="mb-0 text-center mt-4">Logged-in user</h2>
    <div class="border p-3 m-4" id="summary">
        <h4>Username: <?php echo $_SESSION["userID"] ?></h4>
        <h4>Name: <?php echo $_SESSION["name"] ?></h4>
        <h4>Surname: <?php echo $_SESSION["surname"] ?></h4>
        <h4>Email: <?php echo $_SESSION["email"] ?></h4>
        <h4>Birthday: <?php echo $_SESSION["birthdate"] ?></h4>
        <a href="../DrinkVibes/utils/logout.php" class="btn text-uppercase">Logout</a>
    </div>


</div>