<form action="{{route('worktodo.update', $key)}}" method="post">
    @csrf
    @method('PATCH')
    <input
      type="hidden"
      name="statusWork"
      value="{{$value}}">
      <button class="dropdown-item">{{$btnText}}</button>
</form>
