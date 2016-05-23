@extends('layouts.backend')

@section('title', 'Create Advertisement')

@section('content')
@if (count($errors) > 0)
    @include('partials.errors')
@endif

    <div class="image">
        <img src="image.jpg" alt="Mountain View" style="width:304px;height:228px;">
    </div>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label>Select image to upload:</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br>
        <input type="submit" class="btn btn-success" value="Upload Image" name="submit">
    </form>
<br>

<div class="form-group">
    <label for="inputDescription">Description</label>
    <input
        type="text" class="form-control"
        name="description" id="inputDescription"
        placeholder="Description"
        value="<?= escape(old('description', $product->description)) ?>" />
</div>
<div class="form-group">
    <label for="inputStartDate">Start Date</label>
    <input
        type="date" class="form-control"
        name="date" id="inputDate"
        placeholder="Start Date"
        value="<?= escape(old('date', $product->startDate)) ?>"/>
</div>

<div class="form-group">
    <label for="inputEndDate">End Date</label>
    <input
        type="endDate" class="form-control"
        name="endDate" id="inputEndDate"
        placeholder="End Date"
        value="<?= escape(old('endDate', $product->endDate)) ?>"/>
</div>

<div class="form-group">
    <label for="inputPrice">Price</label>
    <input
        type="price" class="form-control"
        name="price" id="inputPrice"
        placeholder="Price"
        value="<?= escape(old('price', $product->price)) ?>"/>
</div>

<div class="form-group">
    <label for="inputQunatity">Quantity</label>
    <input
        type="quantity" class="form-control"
        name="quantity" id="inputQuantity"
        placeholder="Quantity"
        value="<?= escape(old('quantity', $product->quantity)) ?>"/>
</div>

<div class="form-group">
    <label for="inputMediaContent">Media Content</label>
    <input
        type="mediaContent" class="form-control"
        name="mediaContent" id="inputMediaContent"
        placeholder="Media Content"
        value="<?= escape(old('mediaContent', $product->mediaContent)) ?>"/>
</div>

<div class="form-group">
    <label for="inputTags">Tags</label>
    <input
        type="tags" class="form-control"
        name="tags" id="inputTags"
        placeholder="Tags"
        value="<?= escape(old('tags', $product->tags)) ?>"/>
</div>

<div class="form-group">
        <button type="submit" class="btn btn-success" name="ok">Add</button>
        <button type="submit" class="btn btn-default" name="cancel">Cancel</button>
    </div>

@endsection    