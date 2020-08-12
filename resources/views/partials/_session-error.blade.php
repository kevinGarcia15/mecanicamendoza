@if(session('error'))
  <div class="alert alert-danger" role='alert'>
    {{session('error')}}
    <button
    type="button"
    name="button"
    class="close"
    data-dismiss="alert"
    aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
