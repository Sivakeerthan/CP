

<?php
if(!isset($_SESSION)) {
    session_start();
}
if(isset($_SESSION['err'])):
    foreach($_SESSION['err'] as $error):?>
        <script type="text/javascript">
            M.toast({html: '<?=$error?>'})
        </script>
    <?php endforeach;
endif;
$_SESSION['err'] = null; ?>

  </body>
</html>
