<ul class="dropdown-menu">
    <li class="header">You have <?= count($messages)?> messages</li>
    <li>
        <!-- inner menu: contains the actual data -->
        <ul class="menu">


                <?php if (!empty($messages)){
                    foreach ($messages as $message) {
                        ?>
                        <li><!-- start message -->
                            <a href="">
                                <div class="pull-left">
                                    <?= $message['name']?>
                                </div>
                                <h4>
                                    <?= substr($message['body'],0,10).'...';?>
                                    <small><i class="fa fa-clock-o"></i> <?= $message['created_at']?></small>
                                </h4>
                                <p><?= $message['email'] ?></p>
                            </a>
                        </li>
                <?php
                    }
                }  ?>

            <!-- end message -->

        </ul>
    </li>
    <li class="footer"><a href="/contacts/contact">See All Messages</a></li>
</ul>