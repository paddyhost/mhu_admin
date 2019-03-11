<footer id="footer">
    Copyright &copy; 2018 MHU

    <ul class="f-menu">
        <li><a href="">New Registration</a></li>
        <li><a href="">Dashboard</a></li>
        <li><a href="">Patient List</a></li>
    </ul>
</footer>

<div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form class="upload_csv" method="post" enctype="multipart/form-data" action="<?php echo site_url('patient/upload_csv') ?>">
            <div class="modal-header">
                <h4 class="modal-title">Import Patient Data</h4>
            </div>
            <div class="modal-body">
                <div class="jumbotron p-30">
                    <h4 class="m-b-10">Click to browse CSV or Excel file</h4>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <span class="btn btn-primary btn-file m-r-10">
                            <span class="fileinput-new">Select file</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="upload_csv" id="upload_csv" accept=".csv">
                        </span>
                        <span class="fileinput-filename"></span>
                        <a href="#" class="close fileinput-exists" data-dismiss="fileinput">&times;</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="upload_submit" class="btn btn-warning btn-icon-text waves-effect"><i class="zmdi zmdi-upload zmdi-hc-fw"></i>Import</button>
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </form>
        </div>
    </div>
</div>

