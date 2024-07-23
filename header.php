<html lang="ar">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
    if($pageTitle == "الإدارة") {
      echo '<link rel="stylesheet" href="css/vanilla-dataTables.min.css" />';
    }
    ?>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <title><?= $pageTitle ?></title>
    <script>
      window.onload = function() {
        let hasDropdownLinks = document.querySelectorAll('nav .has-dropdown > a');
        hasDropdownLinks.forEach(linkItem => {
          linkItem.onclick = function(e) {
            e.preventDefault();
          }
        })
      }
    </script>
  </head>
  <body>
    <header>
      <div class="container">
        <div class="logo-title-wrapper">
          <div class="logo" >
            <img src="images/iraqmoon-log.png" alt="Website Logo">
          </div>
          <h1 class="title">نظام تسجيل معلومات الخريجين</h1>
        </div>
      </div>
    </header>