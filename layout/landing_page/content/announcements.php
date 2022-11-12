<!-- Page Content-->
<div class="container px-4 px-lg-5">
    <section class="py-5 text-center container">
        <div class="row py-lg-2">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Announcements</h1>
                <p class="lead text-muted">This is the Announcements page that will serve as the bulletin board of the e barangay website of Barangay Wawa, Taguig City. Get the latest updates happening here at the barangay by going in the Announcement page.
                </p>
                <p>
                </p>
            </div>
        </div>
    </section>

    <div class="album py-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php if (count($list) > 0) { ?>
                    <?php foreach ($list as $res) { ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="<?= BASE_URL . "files/announcement/" . $res['image']; ?>" class="bd-placeholder-img card-img-top" alt="" height="225" width="100%" style="object-fit:unset!important">
                                <div class="card-body bg-success">
                                    <p class="card-text  text text-light"><?= $res['title']; ?></p>
                                    <p class="card-text  text text-light pull-right" style="font-size:12px"><i>Posted on <?= format_date($res['updated_date']); ?></i></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-light btn-view" name="landing_page/announcements/view" value="<?= $res['id']; ?>">View More</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>


            </div>
        </div>
    </div>
</div>