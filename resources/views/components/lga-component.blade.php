<select name="lga_id" class="form-control">
    <option value=""> </option>
    @foreach ($lgas as $lga)
    <option  value="{{ $lga->id }}">{{ $lga->name }}</option>
    @endforeach
</select>  