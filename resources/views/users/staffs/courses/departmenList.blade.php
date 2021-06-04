<div class="form-group">
    <label for="sel1">Select department:</label>
    <select class="form-control" id="sel1" name="dept">

        <option value="">Deparment</option>
        @if ($depts)
        @foreach ($depts as $dept)
            <option value="{{ $dept->id }}">{{ $dept->dept }}</option>
        @endforeach
        @endif

    </select>
  </div>
