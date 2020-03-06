
        <?php foreach($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>

        <!-- SCRIPT DE VALIDACION DE CAMPOS DE FORMULARIOS DE LAS ENCUESTAS -->
        <script src="<?php echo base_url(); ?>assets/comun/js/encuesta.js"></script>

        <?php echo form_close(); ?>

    	<p class="footer">Página creada en <strong>{elapsed_time}</strong> segundos. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter <strong>' . CI_VERSION . '</strong>' : '' ?></p>

    </div>

  </body>
</html>
