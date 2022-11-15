<?php $default = $data['default_data']; ?>
<?php $officers = $data['officers']; ?>
<?php $layers = $data['layers']; ?>
<style>
    .box-mg {
        margin: 0px 10px;
    }

    .card-footer {
        text-align: center;
    }
</style>
<!-- Page Content-->
<div class="container px-4 px-lg-5">

    <div class="row gx-4 gx-lg-5 align-items-center pt-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-12 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title text-center">About Us</h2>
                        <p class="card-text"><?= $default->about ?>
                        </p>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>


        </div>
    </div>

    <!-- Heading Row-->
    <div class="row gx-4 gx-lg-5 align-items-center pt-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-6 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title text-center">Mission</h2>
                        <p class="card-text"><?= $default->mission ?>
                        </p>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title text-center">Vision</h2>
                        <p class="card-text"><?= $default->vision ?>
                        </p>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>

        </div>
    </div>

    <div class="col-md-12 mb-5">

        <div class="col-md-5">
        </div>
        <div style="margin-top:30px"></div>
        <?php foreach ($layers as $res) { ?>

            <div class="row">
                <div class="col-md-5">
                </div>
                <div class="col-md-2" style="display:flex;justify-content:space-around">
                    <?php foreach ($officers as $subres) { ?>
                        <?php if ($subres['column'] == $res['id']) { ?>
                            <div class="box box-mg">
                                <div class="box-header" style="padding:unset">
                                    <img class="img-responsive" src="<?= BASE_URL . "assets/officer/" . $subres['image']; ?>" alt="Photo" style="height:120px;max-height:120px!important;min-width:120px;width:100%;object-fit:fill!important">
                                </div>
                                <div class="card-footer"><?= $subres['position'] ?> <br><?= strlen($subres['name']) > 9 ? substr($subres['name'], 0, 9) . "..." : $subres['name'];  ?></div>
                            </div>
                        <?php } ?>
                    <?php } ?>

                </div>
                <div class="col-md-5">
                </div>
            </div>
        <?php } ?>


    </div>

</div>