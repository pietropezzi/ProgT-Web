<div class="sidebar">
    <ul class="nav flex-column font-verdana" id="navigation">
    <?php foreach($Categories as $cat): ?>
        <li><a class="nav-link mt-2 mx-2 text-white" href="<?php echo $CatToLink[$cat]; ?>" ><?php echo $cat; ?></a></li>
    <?php endforeach; ?>
    </ul>

    <?php if(isset($_SESSION["email"])): ?>
    <div class="user">
        <?php require("user-info.php"); ?>
    </div>
    <?php endif; ?>
    <button class="sidebarBtn">
        <img class="img-fluid text-center" src="<?php echo IMAGES_DIR; ?>menu.png" alt="menu"/>
    </button>
</div>