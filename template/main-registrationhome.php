<div>
    <h2 class="mb-0 text-center mt-4">New registered user</h2>
    <h4 class="mb-0 text-center mt-4">Thank you for your registration on our site!</h4>
    <div class="bg-light border p-3 m-4">
        <h4>Username: <?php echo $_SESSION["userID"] ?></h4>
        <h4>Name: <?php echo $_SESSION["name"] ?></h4>
        <h4>Surname: <?php echo $_SESSION["surname"] ?></h4>
        <h4>Email: <?php echo $_SESSION["email"] ?></h4>
        <h4>Birthday: <?php echo $_SESSION["birthdate"] ?></h4>
    </div>
</div>