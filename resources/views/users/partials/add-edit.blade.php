 <div class="image">
        <img src="{{$user->profile_photo}}" alt="Mountain View" style="width:304px;height:228px;" >
    </div>
    
        <label>Select image to upload:</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br>
        <input type="submit" class="btn btn-success" value="Upload Image" name="submit">
  <br>
   
<div class="form-group">
    <label for="inputFullname">Fullname</label>
    <input
        type="text" class="form-control"
        name="name" id="inputFullname"
        placeholder="Fullname" value="{{ $user->name }}" />
</div>
<div class="form-group">
    <label for="inputType">Type</label>
    <select name="user_type" id="inputType" class="form-control">

        <option disabled selected> -- select an option -- </option>
        @if($user->admin)
        <option value="1" selected >Administrator</option>
        <option value="0">Client</option>
        @else
        <option value="1">Administrator</option>
        <option value="0" selected>Client</option>
        @endif
    </select>
</div>
<div class="form-group">
    <label for="inputEmail">Email</label>
    <input
        type="email" class="form-control"
        name="email" id="inputEmail"
        placeholder="Email address" value="{{ $user->email }}"/>
</div>

<div class="form-group">
    <label for="inputLocation">Location</label>
    <input
        type="text" class="form-control"
        name="location" id="inputLocation"
        placeholder="Location" value="{{ $user->location }}"/>
</div>

<div class="form-group">
    <label for="inputProfileUrl">Profile URL</label>
    <input
        type="text" class="form-control"
        name="profile_url" id="inputProfileUrl"
        placeholder="Profile URL" value="{{ $user->profile_url }}"/>
</div>


