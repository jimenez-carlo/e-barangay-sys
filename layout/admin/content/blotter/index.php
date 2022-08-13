        <h1 class="box-title"><i class="fa fa-address-book"></i> Blotter List</h1>
        <div class="row">
          <div class="col-xs-12">
            <div class="box">

              <div class="box-body">
                <div class="row">
                  <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                      <thead>
                        <tr role="row">
                          <th>ID#</th>
                          <th>Complainant</th>
                          <th>Complainee</th>
                          <th>Location</th>
                          <th>Incident Date</th>
                          <th>Status</th>
                          <th>Action Taken</th>
                          <th>Encoded By</th>
                          <th>Encoded Date</th>
                          <th>Last Updated</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($list as $res) { ?>
                          <tr>
                            <td><?= $res['id'] ?></td>
                            <td><?= $res['complainant'] ?></td>
                            <td><?= $res['complainee'] ?></td>
                            <td><?= $res['incidence'] ?></td>
                            <td><?= $res['incidence_date'] ?></td>
                            <td><?= $res['status'] ?></td>
                            <td><?= $res['type'] ?></td>
                            <td><?= $res['encoder'] ?></td>
                            <td><?= $res['created_date'] ?></td>
                            <td><?= $res['updated_date'] ?></td>
                            <td>
                              <button type="button" class="btn btn-sm btn-flat btn-success"> <i class="fa fa-eye"></i> View</button>
                              <button type="button" class="btn btn-sm btn-flat btn-success"> <i class="fa fa-plus"></i> New tab</button>
                              <button type="button" class="btn btn-sm btn-flat btn-success"> <i class="fa fa-check"></i> Approve</button>
                              <button type="button" class="btn btn-sm btn-flat btn-success"> <i class="fa fa-times"></i> Disapprove</button>
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

        </div>

        <script>
          $(function() {
            // $('#example1').DataTable()
            $('table').DataTable({
              'paging': true,
              // 'lengthChange': false,
              'searching': true,
              'ordering': true,
              'info': true,
              // 'autoWidth': false
            });
          });
        </script>