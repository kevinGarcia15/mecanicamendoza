<form action="{{route('worktodo.update', $key)}}" method="post">
    @csrf
    @method('PATCH')
    <input
      type="hidden"
      name="statusWork"
      value="{{$value}}">
    <input type="hidden" name="worksheet_id" value="{{$key['worksheet_id']}}">
      <button class="dropdown-item">{{$btnText}}</button>
</form>
