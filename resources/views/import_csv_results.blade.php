@include("admin_header")
<div class="container" style="margin:auto;">
    <div class="row">
        <div class="col-10" style="margin:auto;">
            <h5>Import CSV</h5>
            <form action="{{$appUrl}}/admin/process-csv" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Choose your file</label>
                    <input type="file" name="csv-file" required="" accept=".csv">
                </div>
                <div class="form-group">
                    <label>Choose your CSV delimiter</label>
                    <select name="delimiter" class="form-control form-control-sm" required>
                        <option value="" selected disabled>Pick your choice</option>
                        <option value=";">; - Microsoft Excel CSV</option>
                        <option value=",">, - Normal CSV</option>
                    </select>
                </div>
                <button type="submit" name="submitCsv">Import CSV</button>
            </form>
            <br/>
            <hr/>
            <br/>
            <div class="">
                {{$result}}
            </div>
        </div>
    </div>
</div>
@include("admin_footer")