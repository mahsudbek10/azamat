<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './header.php';
//require_once '../db/db.php';
$city = R::getAll("SELECT * FROM azamat_city WHERE id = ? ",[$_GET['city']])
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Подробнее</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index">Главная</a></li>
                        <li class="breadcrumb-item"><a href="more?city=<?= $_GET['city'] ?>">Город и область</a></li>
                        <li class="breadcrumb-item active"><?= $city[0]['name'] ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?= $city[0]['name'] ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Компания</th>
                                        <th>Наименование вакансии</th>
                                        <th>На какой год</th>
                                        <th>Резюме</th>
                                        <th>Дата регистрации резюме</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $cityid=$_GET['city']; 
                                    $specs=R::getAll("SELECT comp.name as comp, s.name as spec, c.name as city, r.year, r.description, r.date_register "
                                            . "FROM azamat_rezume r, azamat_city c, azamat_company comp, azamat_spec s "
                                            . "WHERE r.id_company= comp.id AND r.id_spec = s.id AND c.id = ? AND s.id = ?",[$_GET['city'],$_GET['spec']]);
                                    foreach ($specs as $item):
                                    ?>
                                    <tr>
                                        <td><?= $item['comp']; ?></td>
                                        <td><?= $item['spec']; ?></td>
                                        <td><?= $item['year']; ?></td>
                                        <td><?= $item['description']; ?></td>
                                        <td><?= $item['date_register']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Компания</th>
                                        <th>Наименование вакансии</th>
                                        <th>На какой год</th>
                                        <th>Резюме</th>
                                        <th>Дата регистрации резюме</th>
                                    </tr>
                                </tfoot>
                            </table>                          
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>

<?php
require_once './footer.php';
?>