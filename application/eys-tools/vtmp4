<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }
</style>

<div id="eys-nav-i">
    <ul>
        <li><?php echo anchor('sexo', 'Home'); ?></li>
    </ul>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h3>Sexo - Listar</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-bordered table-hover" id="mydatac">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="show_data"></tbody>
            </table>
        </div>
    </div>
</div>



<script type="text/javascript">
    $(document).ready(function(){
        var mytabla = $('#mydatac').DataTable({
            "ajax": {
                url: '<?php echo site_url('sexo/sexo_data')?>',
                type: 'GET'
            }
        });

        $('#show_data').on('click','.item_ver', function(){
            var id = $(this).data('idsexo');
            var retorno = $(this).data('retorno');
            window.location.href = retorno + '/' + id;
        });
    });
</script>

