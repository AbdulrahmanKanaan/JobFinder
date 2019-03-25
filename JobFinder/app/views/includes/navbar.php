<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand ml-3" href="<?php echo URLROOT . '/home'; ?>"><?php echo SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo URLROOT . '/home'; ?>">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Jobs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT . '/cvs'; ?>">CVs</a>
        </li>
        </ul>
        <ul class="navbar-nav ml-auto mr-3">
            <li class="nav-item">
                <a class="nav-link digital-clock" style="cursor: default;" style="color: white;"></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                    <i class="fa fa-user"></i> <?php echo $_SESSION['curFullname']; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?php echo URLROOT . '/users/me' ?>">Me</a>
                    <a class="dropdown-item" href="<?php echo URLROOT . '/users/profile' ?>">Profile</a>
                    <a class="dropdown-item" href="<?php echo URLROOT . '/users/account' ?>">Account</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo URLROOT ?>/users/logout">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>