<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<meta charset="utf-8">
<!--<link rel="stylesheet" href="scripts/upload_image/css/bootstrap.min.css">-->
<!--<link rel="stylesheet" href="scripts/upload_image/css/style.css">-->
<!--[if lt IE 7]>
<link rel="stylesheet" href="scripts/upload_image/css/bootstrap-ie6.min.css">
<![endif]-->
<!--<link rel="stylesheet" href="scripts/upload_image/css/jquery.fileupload-ui.css">-->
<!-- CSS adjustments for browsers with JavaScript disabled -->
<!--<noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>-->

<div class="container">

        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->

            <input type="file" name="foto"  />
        <span class="btn btn-success fileinput-button">
            <i class="icon-plus icon-white"></i>
            <span>Agregar Foto.</span>
        </span>

        <!-- The table listing the files available for upload/download -->
        <div role="presentation" class="table table-striped"><div class="files"></div></div>

</div>

<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) {  %}
    <div class="template-upload fade">

        <span class="preview"></span><br/>

        <input type="hidden" name="foto_empleado" value="{%=file.name%}" /><br/>

        {% if (file.error) { %}
        <div><span class="label label-important">Error</span> {%=file.error%}</div><br/>
        {% } %}

        {% if (!i) { %}
        <button class="btn btn-danger cancel" type="button">
            <i class="icon-trash icon-white"></i>
            <span>Eliminar</span>
        </button>
        {% } %}

    </div>
    {% } %}
</script>

<script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
            </p>
            {% if (file.error) { %}
            <div><span class="label label-important">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="icon-trash icon-white"></i>
                <span>Delete</span>
            </button>
            <input type="checkbox" name="delete" value="1" class="toggle">
        </td>
    </tr>
    {% } %}
</script>


<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>-->
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="scripts/upload_image/js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="scripts/upload_image/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="scripts/upload_image/js/load-image.min.js"></script>
<!-- The basic File Upload plugin -->
<script src="scripts/upload_image/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="scripts/upload_image/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="scripts/upload_image/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="scripts/upload_image/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="scripts/upload_image/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="scripts/upload_image/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="scripts/upload_image/js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<script src="scripts/upload_image/js/main.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
<!--[if gte IE 8]>
<script src="scripts/upload_image/js/cors/jquery.xdr-transport.js"></script>
<![endif]-->

