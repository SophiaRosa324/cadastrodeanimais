</main> <!-- /container -->

<footer class="container-fluid bg-dark text-white py-4 mt-auto">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <?php $data = new DateTime("now", new DateTimeZone("America/Sao_Paulo")); ?>
                <p class="mb-0">&copy;2025 à <?php echo $data->format("Y") ?> - Sophia Rosa e Beatriz de Andrade</p>
                <p class="mb-0">Sistema de Gerenciamento de Clientes e Animais</p>
            </div>
        </div>
    </div>
</footer>

<script src="<?php echo BASEURL; ?>js/awesome/jquery-3.7.1.min.js"></script>
<script src="<?php echo BASEURL; ?>js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?php echo BASEURL; ?>js/awesome/all.min.js"></script>
<script src="<?php echo BASEURL; ?>js/main.js"></script>

</body>
</html>