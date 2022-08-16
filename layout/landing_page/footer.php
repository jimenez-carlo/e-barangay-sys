   <!-- Footer-->
   <footer class="py-5 bg-success">
     <div class="container px-4 px-lg-5">
       <p class="m-0 text-center text-white">Copyright &copy; E-Barangay 2022</p>
     </div>
   </footer>
   <!-- Bootstrap core JS-->
   <script src="js/landing_page_bootstrap.js"></script>
   <!-- Core theme JS-->
   <script src="js/landing_page.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script>
     $(document).on("click", '.btn-edit, .btn-view', function() {
       let ele = $(this);
       let page = ele.attr('name');
       let id = (ele.attr('value')) ? ele.attr('value') : 0;

       $("#result").html('');

       $("#content").load(base_url + 'page.php?page=' + page + '&id=' + id);
     });
   </script>


   </body>

   </html>