<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/tweety/app/config/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/tweety/app/models/Search.php";

if (isset($_POST['search']) && !empty($_POST['search'])) {
    $result = searchUser($_POST['search']);
    echo ' <div class="nav-right-down-wrap"> <ul> ';
    foreach ($result as $user) { ?>

        <li>
            <div class="nav-right-down-inner">
                <a href="<?php echo URLROOT . '/users/profile/' . $user->username ?>">
                    <div class="nav-right-down-left">
                        <img src="<?php echo URLROOT; ?>/images/<?php echo $user->profileImage; ?>">
                    </div>
                    <div class="nav-right-down-right">
                        <div class="nav-right-down-right-headline">
                            <?php echo $user->screenName; ?><span> @<?php echo $user->username; ?></span>
                        </div>
                        <div class="nav-right-down-right-body">

                        </div>
                    </div>
                    </a>
            </div>
        </li>


<?php }
    echo '</ul></div>';
}
?>