<div class="head-div">
    <div class="main">
        <div class="head">
            <span>EVEST</span>
            <p>THE BIGGEST CHOICE OF THE WEB</p>
        </div>
        <div class="btn">
            <?php
            if (empty($_SESSION['username'])) {
            ?>
                <a href="./signUp.php"><input type="button" name="" value="Log in"></a>
            <?php
            } else {
            ?>
                <a href="./index.php?log=1"><input type="button" name="" value="Logout <?php if (!empty($_SESSION["username"])) echo $_SESSION["username"] ?>"></a>
            <?php
            }
            ?>
        </div>
    </div>
</div>