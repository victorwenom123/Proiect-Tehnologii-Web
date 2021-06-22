<html>
<head>
    <title>{{$appName}} - {{$pageTitle}}</title>
    <link rel="stylesheet" href="{{$appUrl}}/load_resource.php?file=admin.css&type=css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="bg-light">
<div class="container-fluid" style="margin:auto;">
    <div class="row" >
        <div class="col-12">
            <div class="row">
                <div class="col-8">
                    <h3>Admin</h3>
                </div>
                <div class="col-4 text-right">
                    <a href="{{$appUrl}}">Main Site</a> / <a href="{{$appUrl}}/admin">Admin Home</a> / <a href="{{$appUrl}}/admin/import-csv">Import .CSV</a> / <a href="{{$appUrl}}/admin/songs">Songs</a> / <a href="{{$appUrl}}/admin/add-song">Add New Song</a> / <a href="{{$appUrl}}/admin/users">Users</a> / <a href="{{$appUrl}}/logout">Logout</a>
                </div>
            </div>
            <hr class="bg-dark"/>
        </div>
    </div>
</div>