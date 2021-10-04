<?php
if (isset($_POST['notes_id'])) {
    include('config.php');
    $notesd_id = $_POST['notes_id'];
    $data = '';
    $historyMember = $conn->query("SELECT * FROM `post_history` WHERE `fld_id`='$notesd_id'");
    $row = $historyMember->fetch_assoc();
            echo '<form class="form-horizontal" id="postupdate">
                        <div class="form-group">
                            <label>Date</label>
                            <div class="input-group">
                                <span class="input-group-addon bg-info">
                                    <span class="fa fa-calendar p-2"></span>
                                </span>
                                <input type="text" class="form-control" value="'.date("m/d/Y",strtotime($row['fld_date'])).'" required disabled style="color: #ccc;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>About/Title</label>
                            <input type="text" name="abouttitle" class="form-control" id="abouttitle" value="'.$row['abouttitle']. '">
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-xs-12 control-label">Post Content/Text</label>
                            <textarea name="contenttext" id="contenttext" class="form-control" rows="2">' . $row['contenttext'] . '</textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-xs-12 control-label">Post Content/Link</label>
                            <textarea name="contentLink" id="contentLink" class="form-control" rows="2">' . $row['contentLink'] . '</textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-xs-12 control-label">Post Content/video</label>
                            <video width="120" height="90" controls>
                        <source src="' . $row["Contentvideo"] . '" type="video/mp4">
                        <source src="' . $row["Contentvideo"] . '" type="video/ogg">
                        Your browser does not support the video tag.
                        </video>
                            <input class="form-control" type="file" id="Contentvideo" name="Contentvideo">
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-xs-12 control-label">Post Content/Image</label>
                            <img src="'.$row['Contentimage'].'" width="150">
                            <input class="form-control" type="file" id="Contentimage" name="Contentimage">
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-xs-12 control-label"> Comment Details</label>
                            <textarea name="comment" id="comment" class="form-control" rows="2">'.$row['comment'].'</textarea>
                        </div>
                        <input type="hidden" value="'. $row['fld_id'].'" name="user_id">
                        <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Save Notes">
                        </div>
                    </div>
                </div>
            </form>';
}
?>