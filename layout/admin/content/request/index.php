       <section class="content-header">
         <h1>
           <i class="fa fa-files-o"></i> Requests
         </h1>
       </section>
       <section class="content">
         <div class="row">
           <div class="col-xs-12">
             <div class="box box-success">
               <div class="box-header with-border">
                 <form action="" method="post" name="resident_request">
                   <!-- <button type="submit" class="btn btn-sm btn-flat btn-success" name="type" value="id"> Create Request ID <i class="fa fa-id-card-o"></i></button>
                   <button type="submit" class="btn btn-sm btn-flat btn-success" name="type" value="clearance"> Create Request Barangay Clearance <i class="fa fa-file-text"></i></button>
                   <button type="submit" class="btn btn-sm btn-flat btn-success" name="type" value="residency"> Create Request Residency <i class="fa fa-user-plus"></i></button> -->
                 </form>
               </div>
               <div class="box-body">
                 <div class="row">
                   <div class="col-sm-12">
                     <table class="table table-bordered table-striped table-hover dataTable" role="grid">
                       <thead>
                         <tr role="row">
                           <th>ID#</th>
                           <th>Resident</th>
                           <th>Request Type</th>
                           <th>Status</th>
                           <th>Approver</th>
                           <th>Created Date</th>
                           <th>Last Updated</th>
                           <th>Settings</th>
                         </tr>
                       </thead>
                       <tbody>
                         <?php foreach ($list as $res) { ?>
                           <tr>
                             <td><?= $res['id'] ?></td>
                             <td><?= $res['requestor_name'] ?></td>
                             <td><?= $res['request_type'] ?></td>
                             <td><?= strtoupper($res['status']); ?></td>
                             <td><?= $res['approver_name'] ?></td>
                             <td><?= format_date_time_am_pm($res['created_date']); ?></td>
                             <td><?= format_date_time_am_pm($res['updated_date']); ?></td>
                             <td>
                               <button type="button" class="btn btn-sm btn-flat btn-success btn-view" name="admin/request/edit" value="<?= $res['id']; ?>"> <i class="fa fa-edit"></i> Edit</button>
                               <button type="button" class="btn btn-sm btn-flat btn-success" name="admin/blotter/view" value="<?= $res['id']; ?>"> Send SMS <i class="fa fa-envelope"></i></button>
                               <!-- <button type="button" class="btn btn-sm btn-flat btn-success"> <i class="fa fa-check"></i> Approve</button>
                               <button type="button" class="btn btn-sm btn-flat btn-success"> <i class="fa fa-times"></i> Disapprove</button> -->
                               <button type="button" class="btn btn-sm btn-flat btn-success" <?= !in_array($res['request_status_id'], array(4, 5)) ? 'disabled' : ''; ?>> <i class="fa fa-print"></i> Print</button>
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
           // $('#example1').DataTable()
           $('table').DataTable({
             'paging': true,
             // 'lengthChange': false,
             'searching': true,
             'ordering': true,
             'aaSorting': [], // disabled auto sort
             'info': true,
             // 'autoWidth': false
           });
         });
       </script>