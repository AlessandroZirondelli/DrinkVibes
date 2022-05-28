<div class="container" id="container-summary">
    <h3 class="mb-0 text-center mt-4">Logged-in user</h3>
    <div class="border p-3 m-4" id="summary">
        <ul class="list-unstyled ">
            <li> Username: <?php echo $_SESSION["userID"] ?> </li>
            <li> Name: <?php echo $_SESSION["name"] ?> </li>
            <li> Surname: <?php echo $_SESSION["surname"] ?> </li>
            <li> Email: <?php echo $_SESSION["email"] ?> </li>
            <li> Birthday: <?php echo $_SESSION["birthdate"] ?> </li>
            <li> <a href="../DrinkVibes/utils/logout.php" class="btn text-uppercase">Logout</a> </li>
        </ul>
    </div>


</div>