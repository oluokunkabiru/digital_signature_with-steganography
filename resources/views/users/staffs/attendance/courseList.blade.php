<div class="form-group">
    <label for="sel1">Select course:</label>
    <select class="form-control" id="course" name="course">

        <option value="">Courses</option>
        @if ($courses)
        @foreach ($courses as $course)
            <option value="{{ $course->id }}">{{ $course->title }} || {{ $course->code }}</option>
        @endforeach
        @endif

    </select>
  </div>
