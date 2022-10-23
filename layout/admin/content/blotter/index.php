        <section class="content-header">
          <h1>
            <i class="fa fa-address-book"></i> Incident Reports
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
                            <th>Complainant</th>
                            <th>Complainee</th>
                            <th>Location</th>
                            <th>Incident Date</th>
                            <th>Status</th>
                            <th>Action Taken</th>
                            <th>Encoded By</th>
                            <th>Encoded Time</th>
                            <th>Last Updated</th>
                            <th>Settings</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($list as $res) { ?>
                            <tr>
                              <!-- <td><?= $res['id'] ?></td> -->
                              <td><?= $res['complainant'] ?></td>
                              <td><?= $res['complainee'] ?></td>
                              <td><?= $res['incidence'] ?></td>
                              <td><?= format_date($res['incidence_date']); ?></td>
                              <td><?= $res['status'] ?></td>
                              <td><?= $res['type'] ?></td>
                              <td><?= $res['encoder'] ?></td>
                              <td><?=
                                  date("h:i a", strtotime($res['created_date'])); ?></td>
                              <!-- <td><?= format_date_time_am_pm($res['created_date']); ?></td> -->
                              <td><?= format_date_time_am_pm($res['updated_date']); ?></td>
                              <td>
                                <button type="button" class="btn btn-sm btn-flat btn-success btn-view" name="admin/blotter/edit" value="<?= $res['id'] ?>"> <i class="fa fa-eye"></i> Edit</button>
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
                  text: '<i class="fa fa-plus"></i> New Incident Report</button>',
                  className: 'btn btn-sm btn-flat btn-success btn-view',
                  attr: {
                    name: 'admin/blotter/create'
                  }
                },
                {
                  extend: 'excel',
                  text: '<i class="fa fa-file-excel-o"></i> Export </button>',
                  className: 'btn btn-sm btn-flat btn-success',
                  title: 'Incident Report Requests'

                }
              ]
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