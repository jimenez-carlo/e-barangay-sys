       <section class="content-header">
         <h1>
           <i class="fa fa-files-o"></i> My Request
         </h1>
       </section>
       <section class="content">
         <div class="row">
           <div class="col-xs-12">
             <div class="box box-success">
               <div class="box-header with-border">
                 <form action="" method="post" name="resident_request">
                   <button type="submit" class="btn btn-sm btn-flat btn-success" name="type" value="id"> Create Request ID <i class="fa fa-id-card-o"></i></button>
                   <button type="submit" class="btn btn-sm btn-flat btn-success" name="type" value="clearance"> Create Request Barangay Clearance <i class="fa fa-file-text"></i></button>
                   <button type="submit" class="btn btn-sm btn-flat btn-success" name="type" value="residency"> Create Request Residency <i class="fa fa-user-plus"></i></button>
                 </form>
               </div>
               <div class="box-body">
                 <div class="row">
                   <div class="col-sm-12">
                     <table class="table table-bordered table-striped table-hover dataTable" role="grid">
                       <thead>
                         <tr role="row">
                           <th>ID#</th>
                           <th>Request Type</th>
                           <th>Status</th>
                           <th>Approver</th>
                           <th>Last Updated</th>
                           <!-- <th>Settings</th> -->
                         </tr>
                       </thead>
                       <tbody>
                         <?php foreach ($requests as $res) { ?>
                           <tr>
                             <td><?= $res['id'] ?></td>
                             <td><?= $res['request_type'] ?></td>
                             <td><?= strtoupper($res['status']); ?></td>
                             <td><?= $res['fullname'] ?></td>
                             <td><?= $res['updated_date']; ?></td>
                             <!-- <td>
                               <button type="button" class="btn btn-sm btn-flat btn-success btn-view" name="admin/blotter/view" value="<?= $res['id'] ?>"> <i class="fa fa-eye"></i> View</button>
                               <button type="button" class="btn btn-sm btn-flat btn-success"> <i class="fa fa-plus"></i> New tab</button>
                               <button type="button" class="btn btn-sm btn-flat btn-success"> <i class="fa fa-check"></i> Approve</button>
                               <button type="button" class="btn btn-sm btn-flat btn-success"> <i class="fa fa-times"></i> Disapprove</button>
                             </td> -->
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