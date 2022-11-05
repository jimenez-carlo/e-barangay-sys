        <section class="content-header">
          <h1>
            <i class="fa fa-address-card"></i> Residents
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
                            <th>Status</th>
                            <th>Full Name</th>
                            <th>Gender</th>
                            <th>City</th>
                            <th>Barangay</th>
                            <th>Contact No#</th>
                            <th>Registered Date</th>
                            <th>Approved By</th>
                            <th>Last Updated</th>
                            <th>Settings</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($list as $res) { ?>
                            <tr>
                              <!-- <td><?= $res['id'] ?></td> -->
                              <td><?= strtoupper($res['status']) ?></td>
                              <td><?= $res['resident_name'] ?></td>
                              <td><?= $res['gender'] ?></td>
                              <td><?= $res['city'] ?></td>
                              <td><?= $res['barangay'] ?></td>
                              <td><?= $res['contact_no'] ?></td>
                              <td><?= format_date_time_am_pm($res['created_date']); ?></td>
                              <td><?= $res['approver_name'] ?></td>
                              <td><?= format_date_time_am_pm($res['updated_date']); ?></td>
                              <td class="flex-td">
                                <button type="button" class="btn btn-sm btn-flat btn-success btn-view" name="admin/resident/edit" value="<?= $res['id'] ?>"> <i class="fa fa-edit"></i> Edit</button>
                                <form method="post" name="verify_resident">
                                  <button type="submit" class="btn btn-sm btn-flat btn-success" <?= ($res['status_id'] == 2) ? "disabled" : ""; ?> name="verify_resident" value="<?= $res['id'] ?>"> <i class="fa fa-check"></i> Verify</button>
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
                  text: '<i class="fa fa-user-plus"></i> Register</button>',
                  className: 'btn btn-sm btn-flat btn-success btn-view',
                  attr: {
                    name: 'admin/resident/create'
                  }
                },
                {
                  extend: 'excel',
                  exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8],
                    format: {
                      header: function(data, columnIdx) {
                        var dom = document.createElement('div');
                        dom.innerHTML = data;
                        return dom.children[0].getAttribute("placeholder")
                      }
                    }
                  },
                  text: '<i class="fa fa-file-excel-o"></i> Export </button>',
                  className: 'btn btn-sm btn-flat btn-success',
                  title: 'Barangay Residents'

                }
              ]
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