<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
  $('#imageModal').on('show.bs.modal', function (event) {
    $('#modal-image').attr('src', $(event.relatedTarget).data('image'))
  })
})
</script>
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg h-100 d-flex flex-column justify-content-center my-0" role="dialog">
    <div class="modal-content ">
      <div class="modal-body ">
        <img src="" id="modal-image" data-dismiss="modal" class="img-fluid " />
      </div>
    </div>
  </div>
</div>

