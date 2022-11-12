        <section class="content-header">
          <h1>
            <i class="fa fa-bullhorn"></i> Announcements
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
                              <!-- <td><?= $res['id'] ?></td> -->
                              <td><?= $res['title'] ?></td>
                              <td><?= format_date($res['start_date']); ?></td>
                              <td><?= format_date($res['end_date']); ?></td>
                              <td><?= strtoupper($res['status']); ?></td>
                              <td><?= $res['fullname'] ?></td>
                              <td><?= format_date_($res['created_date']); ?></td>
                              <td><?= format_date_($res['updated_date']); ?></td>
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
          $(document).ready(function() {
            var table = $('table').DataTable({
              "initComplete": function(settings, json) {
                $(".dt-button").removeClass("dt-button");
              },
              dom: 'Blfrtip',
              "ordering": false,
              buttons: [{
                text: '<i class="fa fa-plus"></i> Add Announcement</button>',
                className: 'btn btn-sm btn-flat btn-success btn-view',
                attr: {
                  name: 'admin/announcement/create'
                }
              }]
            });

            $('table thead tr th').each(function(i, e) {
              var title = $('table thead tr th').eq($(this).index()).text();
              var isLastElement = i == $('table thead tr th').length - 1;
              if (isLastElement) {} else {
                $(this).html('<input id="input' + $(this).index() + '" type="text" class="form-control" placeholder="' + title + '" />').css('padding-left', '4px');
                $(this).on('keyup change', function() {
                  table.column($(this).index()).search($('#input' + $(this).index()).val()).draw();
                });
              }
            });
          });
        </script>