 <!-- Masthead-->
 <header class="masthead">
     <div class="container h-100">
         <div class="row h-100 align-items-center justify-content-center text-center">
             <div class="col-lg-10 align-self-end mb-4 page-title" style="">
                 <h3 class="text-white">Bienvenidos <span>a</span> <?php echo $_SESSION['setting_name']; ?>
                 </h3>
                 <br>
                 <!--<hr class="divider my-4" />-->
                 <a class="btn btn-danger js-scroll-trigger" href="#menu" style="border-radius:12px">Ordenar Ahora</a>

             </div>

         </div>
     </div>
 </header>
 <section class="page-section" id="menu">
     <div id="menu-field" class="card-deck">
         <?php 
                    include'admin/db_connect.php';
                    $qry = $conn->query("SELECT * FROM  product_list order by rand() ");
                    while($row = $qry->fetch_assoc()):
                    ?>
         <br>
         <div class="col-lg-3">
             <div class="card menu-item ">
                 <img src="assets/img/<?php echo $row['img_path'] ?>" class="card-img-top" alt="..." height="170">

                 <div class="card-body">
                     <h3 class="card-title"><?php echo $row['name'] ?></h3>
                     <p class="card-text truncate"><?php echo $row['description'] ?></p>
                     <div class="text-center">
                         <button class="btn btn-sm btn-primary view_prod btn-block" data-id=<?php echo $row['id'] ?>><i
                                 class="fa fa-eye"></i> Ver</button>

                     </div>
                 </div>

             </div>
         </div>
         <?php endwhile; ?>
     </div>
 </section>
 <script>
$('.view_prod').click(function() {
    uni_modal_right('Productos', 'view_prod.php?id=' + $(this).attr('data-id'))
})
 </script>