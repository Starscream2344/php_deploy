<div class="main-content">
    


</div>

<?php if(isset($isDanger)):?>
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">
                    Modal Title
                </h1>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" defer>
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
</script>
<?php endif;?>



