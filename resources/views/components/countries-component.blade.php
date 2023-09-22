<select name="department_id" class="form-control">
    
    <option value=""> </option>
    @foreach ($countries as $countryt)
    <option  value="{{ $countryt->id }}">{{ $countryt->dept_name }}</option>
    @endforeach
</select>