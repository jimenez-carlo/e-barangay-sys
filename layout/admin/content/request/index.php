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
                   <button type="submit" class="btn btn-sm btn-flat btn-success btn-view" name="admin/request/create"> <i class="fa fa-plus"></i> Create Request</button>
                 </form>
               </div>
               <div class="box-body">
                 <div class="row">
                   <div class="col-sm-12">
                     <table class="table table-bordered table-striped table-hover dataTable" role="grid">
                       <thead>
                         <tr role="row">
                           <!-- <th>ID#</th> -->
                           <th>Resident</th>
                           <th>Request Type</th>
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
                             <td><?= $res['requestor_name'] ?></td>
                             <td><?= $res['request_type'] ?></td>
                             <td><?= strtoupper($res['status']); ?></td>
                             <td><?= $res['approver_name'] ?></td>
                             <td><?= format_date$res['created_date']); ?></td>
                             <td><?= format_date$res['updated_date']); ?></td>
                             <td>
                               <button type="button" class="btn btn-sm btn-flat btn-success btn-view" name="admin/request/edit" value="<?= $res['id']; ?>"> <i class="fa fa-edit"></i> Edit</button>
                               <!-- <button type="button" class="btn btn-sm btn-flat btn-success" name="admin/blotter/view" value="<?= $res['id']; ?>"> Send SMS <i class="fa fa-envelope"></i></button> -->
                               <!-- <button type="button" class="btn btn-sm btn-flat btn-success"> <i class="fa fa-check"></i> Approve</button>
                               <button type="button" class="btn btn-sm btn-flat btn-success"> <i class="fa fa-times"></i> Disapprove</button> -->
                               <?php if ($res['request_status_id'] == 4) { ?>
                                 <?php $redirect = array(1 => 'clearance.php', 2 => 'residency.php', 3 => 'id.php'); ?>
                                 <a class="btn btn-sm btn-success btn-flat btn-print" href='<?= BASE_URL . "print/" . $redirect[$res['request_type_id']] . "?pair=" . base64_encode($res['requester_id']) . "&code=" . base64_encode(date("Ymd", time() + 86400)); ?>"' target="_blank"><i class="fa fa-print"></i> Print</a>
                               <?php } else { ?>
                                 <button type="button" class="btn btn-sm btn-success btn-flat" disabled><i class="fa fa-print"></i> Print</button>
                               <?php } ?>
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