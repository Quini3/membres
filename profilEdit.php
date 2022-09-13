
<?php
require 'inc/function.php';
logged_only();

require 'inc/header.php';
?>
<!--==================================
=            User Profile            =
===================================-->

<section class="user-profile section">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
                <div class="sidebar">
                    <!-- User Widget -->
                    <div class="widget user-dashboard-profile">
                        <!-- User Image -->
                        <div class="profile-thumb">
                            <img src="http://127.0.0.1/membres/inc/images/user/user-thumb.jpg" alt="" class="rounded-circle">
                        </div>
                        <!-- User Name -->
                        <h5 class="text-center"> Bonjour <?= $_SESSION['auth']->nom;?></h5>
                        <p>
                            <?php
                            $date = date("d-m-Y");
                            $heure = date("H:i");
                            Print("On est le $date, il est $heure");
                            ?>
                        </p>
                    </div>
                    <!-- Dashboard Links -->
                    <div class="widget user-dashboard-menu">
                        <ul class="nav nav-list">

                            <li class="disabled"> <a href="dashboard-my-ads.html"><i class="icon-book"></i> My Ads</a></li>
                            <li><a href="dashboard-favourite-ads.html"><i class="fa fa-bookmark-o"></i> Favourite Ads <span>5</span></a>
                            </li>
                            <li><a href="dashboard-archived-ads.html"><i class="fa fa-file-archive-o"></i>Archeved Ads <span>12</span></a>
                            </li>
                            <li><a href="dashboard-pending-ads.html"><i class="fa fa-bolt"></i> Pending Approval<span>23</span></a>
                            </li>
                            <li><a href="logout.php"><i class="fa fa-cog"></i> Se deconnecter</a>
                            </li>
                            <li><a href="delete-account.html"><i class="fa fa-power-off"></i>Delete Account</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
                <!-- Edit Personal Info -->
                <div class="widget personal-info">
                    <h2 class="widget-header user">Edit Personal Information</h2>
                    <form action="#">
                        <!-- First Name -->
                        <div class="form-group">

                            <input type="text"  id="inputNom" class="form-control" placeholder=" <?= $_SESSION['auth']->nom;?>" name="nom" readonly>
                        </div>
                        <!-- Last Name -->
                        <div class="form-group">

                            <input type="text" id="inputNom" class="form-control" placeholder=" <?= $_SESSION['auth']->prenom;?>" name="prenom" readonly>
                        </div>

                    </form>
                </div>

                <!-- Change Password -->
                <div class="widget change-password">
                    <h4 class="widget-header user"><font color="#28a745">Modifier votre mot de passe</font></h4>
                    <form action="" method="post">
                        <!-- Current Password -->
                        <div class="form-group">
                            <input type="password" class="form-control" id="current-password"  placeholder="Votre mot depasse courant" name="current-password">
                        </div>
                        <!-- New Password -->
                        <div class="form-group">
                            <input type="password" class="form-control" id="new-password" placeholder="Votre nouveau mot depasse" name="new-password">
                        </div>
                        <!-- Confirm New Password -->
                        <div class="form-group">
                            <input type="password" class="form-control" id="confirm-password" placeholder="Confirmez votre nouveau mot depasse" name="confirm-password">
                        </div>
                        <!-- Submit Button -->
                        <button class="btn btn-small btn-primary">Changez votre mot de passe</button>
                    </form>
                </div>

                <!-- Change Email Address -->
                <div class="widget change-email mb-0">
                    <h4 class="widget-header user"><font color="#28a745">Changez votre email</font></h4>
                    <form action="#">
                        <!-- Current Password -->
                        <div class="form-group">
                            <input type="email" class="form-control" id="current-email" placeholder="<?= $_SESSION['auth']->email;?>" name="current-email">
                        </div>
                        <!-- New email -->
                        <div class="form-group">
                            <input type="email" class="form-control" id="new-email" placeholder="Votre nouveau adresse email" name="new-email">
                        </div>
                        <!-- Submit Button -->
                        <button class="btn btn-small btn-primary">Mettre à jour votre email</button>
                    </form>
                </div>
            </div>
        </div>
</section>


<?php require_once 'inc/footer.php'; ?>