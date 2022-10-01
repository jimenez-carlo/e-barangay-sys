        <section class="content-header">
          <h1>
            <i class="fa fa-users"></i> Barrangay Officials
          </h1>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-success">
                <!-- <div class="box-header with-border">
                  <button type="button" class="btn btn-sm btn-flat btn-success btn-view" name="admin/members/create"> <i class="fa fa-user-plus"></i> Create Member</button>
                </div> -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <table class="table table-bordered table-striped table-hover dataTable" role="grid">
                        <thead>
                          <tr role="row">
                            <th>ID#</th>
                            <th>Access</th>
                            <th>Barangay Position</th>
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
                              <td><?= $res['id'] ?></td>
                              <td><?= $res['access_name'] ?></td>
                              <td><?= $res['title'] ?></td>
                              <td><?= $res['resident_name'] ?></td>
                              <td><?= $res['gender'] ?></td>
                              <td><?= $res['city'] ?></td>
                              <td><?= $res['barangay'] ?></td>
                              <td><?= $res['contact_no'] ?></td>
                              <td><?= format_date_time_am_pm($res['created_date']); ?></td>
                              <td><?= $res['approver_name'] ?></td>
                              <td><?= format_date_time_am_pm($res['updated_date']); ?></td>
                              <td class="flex-td">
                                <button type="button" class="btn btn-sm btn-flat btn-success btn-view" name="admin/members/edit" value="<?= $res['id'] ?>"> <i class="fa fa-edit"></i> Edit</button>
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
            $('table').DataTable({
              "initComplete": function(settings, json) {
                $(".dt-button").removeClass("dt-button");
              },
              dom: 'Blfrtip',
              buttons: [{
                  text: '<i class="fa fa-user-plus"></i> Create Member</button>',
                  className: 'btn btn-sm btn-flat btn-success btn-view',
                  attr: {
                    name: 'admin/members/create'
                  }
                },
                {
                  extend: 'excel',
                  text: '<i class="fa fa-file-excel-o"></i> Export </button>',
                  className: 'btn btn-sm btn-flat btn-success',

                }
              ]
            });
          });
        </script>