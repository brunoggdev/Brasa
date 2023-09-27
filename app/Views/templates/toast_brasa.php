<div class="toast position-fixed bottom-0 right-0 m-3" data-bs-delay="3300" role="alert" aria-live="assertive" aria-atomic="true" id="mensagemToast" style="z-index: 5; right: 0; bottom: 0;">
  <div class="toast-header bg-<?=getMsgBrasa('cor')?>">
    <img src="favicon.ico" height="25px" class="rounded me-2" alt="...">
    <strong class="me-auto text-white">Mensagem</strong>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    <?=getMsgBrasa('texto')?>
  </div>
</div>



<?php if( session()->has('mensagem') && usuario('logado') ): ?>
    <script type="module">
        bootstrap.Toast.getOrCreateInstance('#mensagemToast').show()
    </script>
<?php endif ?>