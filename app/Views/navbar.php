<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url() ?>">Ecommerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>

      <ul class="navbar-nav  mb-2 mb-lg-0">
        <?php $session=session(); ?>
        <?php if($session->loginned=="loginned"): ?>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url() ?><?=$session->user_type=="admin"?"admin_dashboard":"user_dashboard"?>">
           <?=ucfirst($session->username)?>
          </a>
        </li>  
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url("logout") ?>">
          <i class="bi bi-box-arrow-left"></i> Logout
          </a>
        </li>
        <?php else: ?>
          <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url("register") ?>">
          <i class="bi bi-person-plus"></i> Register
          </a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url("login") ?>">
          <i class="bi bi-box-arrow-in-right"></i> Login
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url("contact") ?>">
          <i class="bi bi-person-rolodex"></i> Contact Us
          </a>
        </li>
        <?php endif ?>
        
      </ul>

        
      
    </div>
  </div>
</nav>