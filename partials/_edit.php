<!-- Modal -->
<?php
$sql="SELECT * FROM `comments` WHERE `comment_id`=$commentid";
$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$descOfComment=$row["comment_desc"];
?>

<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo "managedata.php?thid=".$id."&cmtid=".$commentid ?>" method="post">
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editText" class="form-label">Edit Your Text</label>
                            <textarea class="form-control" id="editText" name="editText"
                                rows="3"><?php echo $descOfComment?></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
   