<div class="mb-3">
    <label for="input-title" class="form-label">Title</label>
    <input type="text" class="form-control" id="input-title" name="title" value="{{ old('title', $work->title) }}"
        required>
    @error('title')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="input-description" class="form-label">Description</label>
    <textarea class="form-control" id="input-description" cols="30" rows='8' name="description" required>{{ old('description', $work->description) }}</textarea>
    @error('description')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="input-thumb" class="form-label">Thumb</label>
    <input type="text" class="form-control" id="input-thumb" name="thumb"
        value="{{ old('thumb', $work->thumb) }}" required>
    @error('thumb')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="input-price" class="form-label">Price</label>
    <input type="number" step="0.01" class="form-control" id="input-price" name="price"
        value="{{ old('price', $work->price) }}" required>
    @error('price')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="input-series" class="form-label">Series</label>
    <input type="text" class="form-control" id="input-series" name="series"
        value="{{ old('series', $work->series) }}" required>
    @error('series')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="input-sale_date" class="form-label">Sale date</label>
    <input type="date" class="form-control" id="input-sale_date" name="sale_date"
        value="{{ old('sale_date', $work->sale_date) }}" required>
    @error('sale_date')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="input-type" class="form-label">Type</label>
    <select class="form-select" name="type" id="type" required>
        <option value="comic book" {{ $work->type == 'comic book' ? 'selected' : '' }}>Comic Book</option>
        <option value="graphic novel" {{ $work->type == 'graphic novel' ? 'selected' : '' }}>Graphic Novel</option>
        <option value="other" {{ $work->type == 'other' ? 'selected' : '' }}>Other</option>
    </select>
    @error('type')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="text-center mt-5">
    <button type="submit" class="btn btn-primary btn-lg">SUBMIT COMIC</button>
</div>
