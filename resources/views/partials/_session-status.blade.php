@if(session('status'))
  <div class="alert alert-primary" role='alert'>
    {{session('status')}}
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
