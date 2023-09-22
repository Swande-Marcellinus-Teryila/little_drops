<select name="state_id" class="form-control">
    <option value=""> </option>
    @foreach ($states as $state)
    <option  value="{{ $state->id }}">{{ $state->name }}</option>
    @endforeach
</select>  