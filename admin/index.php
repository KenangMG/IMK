<?php
$title = 'Dasboard';
require 'koneksi.php';
require 'header.php';


?>

<div class="panel-header" style="background-color:#E5E5CB">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h1 class=" pb-2 fw-bold" style="color:black"><?= $title; ?></h1>
                <h2 class=" op-7 mb-2" style="color:black">Staff Dashboard</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round card-imk">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-imk bubble-shadow-small">
                                <i class="fas fa-print"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category fw-bold" style="color:black;" > Sub Program<br> </p>
                                <h4 class="card-title"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</div>
</div>
<?php
require 'footer.php';
?>