  <footer style="background-color: black !important;">
    <div class="d-flex justify-content-end align-items-center" style="margin-right: 50px;">
        <div class="logo"> 
            <?php if (isset($_SESSION['password'])) { ?>
            <a href="../homepage.php"><?php } ?><img src="/images/Movie-List-black.png" alt="logo"></a>
        </div>
        <p class="mt-4" style="margin-left: -70px;">© 2023 Movie List</p>
    </div>
  </footer>
  
</body>
</html>