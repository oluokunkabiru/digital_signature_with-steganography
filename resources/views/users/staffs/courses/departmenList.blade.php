<div class="form-group">
    <label for="sel1">Select department:</label>
    <select class="form-control" id="dept" name="dept">

        <option value="">Departments</option>
        @if ($depts)
        @foreach ($depts as $dept)
            <option value="{{ $dept->id }}">{{ $dept->dept }}</option>
        @endforeach
        @endif

    </select>
  </div>
