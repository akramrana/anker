<?php

/** @var yii\web\View $this */
use yii\helpers\BaseUrl;

$this->title = 'Dashboard';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Overview</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><?= $adminCount; ?></span>
                                    <span>Admins</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-gift"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><?=$itemCount;?></span>
                                    <span>Items</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-lock"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><?=$codeCount;?></span>
                                    <span>Codes</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-gifts"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><?=$claimCount;?></span>
                                    <span>Claims</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Gift Items</h3>
                    <div class="card-tools">
                        <a href="<?php echo BaseUrl::home() ?>item/index" class="btn btn-sm btn-tool">
                            <i class="fas fa-bars"></i> View All
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Remaining QTY</th>
                                <th>...</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($items)) {
                                foreach ($items as $item) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php
                                            echo $item->name_en
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $item->sku
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $item->remaining_qty
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo BaseUrl::home() ?>item/view?item_id=<?php echo $item->item_id ?>" class="text-muted">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Unresolved Gift Claims</h3>
                    <div class="card-tools">
                        <a href="<?php echo BaseUrl::home() ?>gift-claim/index" class="btn btn-sm btn-tool">
                            <i class="fas fa-bars"></i> View All
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>E-mail</th>
                                <th>Phone</th>
                                <th>Claimed Item SKU</th>
                                <th>Submitted At</th>
                                <th>...</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($giftClaims)) {
                                foreach ($giftClaims as $row) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php
                                            echo $row->first_name
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $row->email
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $row->phone
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $row->item_code
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo date('Y-m-d h:i A', strtotime($row->created_at));
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo BaseUrl::home() ?>gift-claim/view?gift_claim_id=<?php echo $row->gift_claim_id ?>" class="text-muted">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Login Codes</h3>
                        <div class="card-tools">
                            <a href="<?php echo BaseUrl::home() ?>login-code/index" class="btn btn-sm btn-tool">
                                <i class="fas fa-bars"></i> View All
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Used At</th>
                                <th>...</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($loginCodes)) {
                                foreach ($loginCodes as $row) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php
                                            echo $row->code
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo!empty($row->used_at) ? date('Y-m-d h:i A', strtotime($row->used_at)) : "";
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo BaseUrl::home() ?>/login-code/view?login_code_id=<?php echo $row->login_code_id ?>" class="text-muted">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
