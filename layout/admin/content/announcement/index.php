        <section class="content-header">
          <h1>
            <i class="fa fa-bullhorn"></i> Announcements
          </h1>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <button type="button" class="btn btn-sm btn-flat btn-success btn-view" name="admin/announcement/create"> <i class="fa fa-plus"></i> Add Announcement</button>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <table class="table table-bordered table-striped table-hover dataTable" role="grid">
                        <thead>
                          <tr role="row">
                            <th>ID#</th>
                            <th>Title</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Updated By</th>
                            <th>Created Date</th>
                            <th>Last Updated</th>
                            <th>Settings</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($list as $res) { ?>
                            <tr>
                              <td><?= $res['id'] ?></td>
                              <td><?= $res['title'] ?></td>
                              <td><?= format_date($res['start_date']); ?></td>
                              <td><?= format_date($res['end_date']); ?></td>
                              <td><?= strtoupper($res['status']); ?></td>
                              <td><?= $res['fullname'] ?></td>
                              <td><?= format_date_time_am_pm($res['created_date']); ?></td>
                              <td><?= format_date_time_am_pm($res['updated_date']); ?></td>
                              <td>
                                <form method="post" name="change_status_announcement">
                                  <button type="button" class="btn btn-sm btn-flat btn-success btn-view" name="admin/announcement/edit" value="<?= $res['id']; ?>"> <i class="fa fa-edit"></i> Edit</button>
                                </form>
                              </td>
                            </tr>
                          <?php } ?>

                        </tbody>

                      </table>
                    </div>
                  </div>

                </div>
              </div>

            </div>

          </div>

        </section>

        <script>
          $(function() {
            $('table').DataTable({
              'paging': true,
              'searching': true,
              'ordering': true,
              'info': true,
              'aaSorting': [], // disabled auto sort
            });
          });
        </script>