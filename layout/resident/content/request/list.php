        <section class="content-header">
          <h1>
            My Requests
          </h1>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-success">

                <div class="box-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <table class="table table-bordered table-striped table-hover dataTable" role="grid">
                        <thead>
                          <tr role="row">
                            <!-- <th>ID#</th> -->
                            <th>Request Type</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Last Updated</th>
                            <th>Settings</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($list as $res) { ?>
                            <tr>
                              <!-- <td><?= $res['id'] ?></td> -->
                              <td><?= $res['type'] ?></td>
                              <td><?= strtoupper($res['status']); ?></td>
                              <td><?= format_date_time_am_pm($res['created_date']); ?></td>
                              <td><?= format_date_time_am_pm($res['updated_date']); ?></td>
                              <td>
                                <?php
                                $type = array(1 => 'edit_barangay_clearance', 2 => 'edit_business_clearance', 3 => 'edit_barangay_id');
                                ?>
                                <button type="button" class="btn btn-sm btn-flat btn-success btn-view" name="resident/request/<?= $type[$res['request_type_id']]; ?>" value="<?= $res['id']; ?>"> <i class="fa fa-eye"></i> View</button>
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
          $(document).ready(function() {
            var table = $('table').DataTable({
              "initComplete": function(settings, json) {
                $(".dt-button").removeClass("dt-button");
              },
              dom: 'Blfrtip',
              buttons: [{
                text: '<i class="fa fa-plus"></i> Add Announcement</button>',
                className: 'btn btn-sm btn-flat btn-success btn-view',
                attr: {
                  name: 'admin/announcement/create'
                }
              }]
            });
            $('table thead tr th').each(function() {
              var title = $('table thead tr th').eq($(this).index()).text();
              $(this).html('<input id="input' + $(this).index() + '" type="text" class="form-control" placeholder="' + title + '" />').css('padding-left', '4px');
              $(this).on('keyup change', function() {
                table.column($(this).index()).search($('#input' + $(this).index()).val()).draw();
              });
            });
          });
        </script>