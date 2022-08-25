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
                              <td>
                                <button type="button" class="btn btn-sm btn-flat btn-success btn-view" name="resident/announcement/view" value="<?= $res['id']; ?>"> <i class="fa fa-eye"></i> View</button>
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