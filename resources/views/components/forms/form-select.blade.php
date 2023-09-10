
    <select name="{{ $name }}">
        @foreach ($options as $option)
            <option value="{{ $option }}">
                {{ $option }}
            </option>
        @endforeach
    </select>
   
