
 <footer id="sticky-footer" class="py-4 text-white-50">
     <div class="container">
         <form method="post" action="subscribeNewsletter.php">
             <div class="form-row">
                 <div class="form-group">
                     <input type="text" name="name" id="name" placeholder="<?php echo $text_name; ?>">
                 </div>
             </div>
             <div class="form-row">
                 <div class="form-group">
                     <input type="text" name="email" id="email" placeholder="E-mail">
                 </div>
             </div>
             <button class="btn btn-secondary" type="submit"><?php echo $text_signup; ?></button>
         </form>
     </div>

     <div class="container text-center">
         <small>Copyright ©2020 All rights reserved | Driv'N Cook Company</small>
     </div>
 </footer>

 <script src="../js/jquery.min.js"></script>
 <script src="../js/bootstrap.bundle.min.js"></script>

 </body>

 </html>
