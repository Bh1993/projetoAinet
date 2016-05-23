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
    <label for="inputFullname">Fullname</label>
    <input
        type="text" class="form-control"
        name="fullname" id="inputFullname"
        placeholder="Fullname" value="" />
</div>
<div class="form-group">
    <label for="inputType">Type</label>
    <select name="user_type" id="inputType" class="form-control">
        <option disabled selected> -- select an option -- </option>
        <option value="0">Client</option>
        <option value="1">Administrator</option>
    </select>
</div>
<div class="form-group">
    <label for="inputEmail">Email</label>
    <input
        type="email" class="form-control"
        name="email" id="inputEmail"
        placeholder="Email address" value=""/>
</div>

<div class="form-group">
    <label for="inputLocation">Location</label>
    <input
        type="text" class="form-control"
        name="location" id="inputLocation"
        placeholder="Location" value=""/>
</div>

<div class="form-group">
    <label for="inputProfileUrl">Profile URL</label>
    <input
        type="text" class="form-control"
        name="profile_url" id="inputProfileUrl"
        placeholder="Profile URL" value=""/>
</div>
