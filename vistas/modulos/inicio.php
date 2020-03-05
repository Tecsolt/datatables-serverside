<h1 id="alinear">Datatables Comparación</h1>


<div id="alinear" class="col-lg-12">
    <h3>Datatable Con ServeSide</h3>
    <hr>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablaConServer">
                    <thead>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th>Código</th>
                        <th>Descripción</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

<div id="alinear" class="col-lg-12">
    <h3>Datatable Sin ServeSide</h3>
    <hr>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablaSinServer">
                    <thead>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th>Código</th>
                        <th>Descripción</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $claves = ControladorBase::crtMostrarClaves();
                    foreach ($claves as $key => $clave) {
                        echo '<tr>
                                <td>' . ($key + 1) . '</td>
                                <td>' . $clave["c_ClaveProdServ"] . '</td>
                                <td>' . $clave["Descripcion"] . '</td>
                                </tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>



