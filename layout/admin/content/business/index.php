       <section class="content-header">
         <h1>
           <i class="fa fa-files-o"></i> Business Clearance Requests
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
                           <th>Resident</th>
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
                             <td><?= strtoupper($res['status']); ?></td>
                             <td><?= $res['approver_name'] ?></td>
                             <td><?= format_date$res['created_date']); ?></td>
                             <td><?= format_date$res['updated_date']); ?></td>
                             <td>
                               <button type="button" class="btn btn-sm btn-flat btn-success btn-view" name="admin/business/edit" value="<?= $res['id']; ?>"> <i class="fa fa-edit"></i> Edit</button>
                               <?php if ($res['request_status_id'] == 4) { ?>
                                 <?php $redirect = array(1 => 'clearance.php', 2 => 'residency.php', 3 => 'id.php'); ?>
                                 <a class="btn btn-sm btn-success btn-flat btn-print" href='<?= BASE_URL . "print/" . $redirect[2] . "?pair=" . base64_encode($res['requester_id']) . "&code=" . base64_encode(date("Ymd", time() + 86400)); ?>"' target="_blank"><i class="fa fa-print"></i> Print</a>
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
         $(document).ready(function() {
           var table = $('table').DataTable({
             "initComplete": function(settings, json) {
               $(".dt-button").removeClass("dt-button");
             },
             dom: 'Blfrtip',
             "ordering": false,
             buttons: [{
               extend: 'excel',
               exportOptions: {
                 columns: [0, 1, 2, 3, 4],
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
               title: 'Business Clearance Requests'

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