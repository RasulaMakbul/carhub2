<h3 style="font-size:30px;color:green;">CSV Data Upload Form</h3>

<p id="show_upload_message"></p>

<form action="javascript:void(0)" id="cdu-frm-upload" enctype="multipart/form-data">
    <label for="csv_data_file">Upload Your File</label>
    <input type="file" name="csv_data_file" id="csv_data_file">
    <input type="hidden" name="action" value="cdu_submit_form_data">
    <button type="submit">Upload</button>
</form>