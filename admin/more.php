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
                    <h1>Город и область</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index">Главная</a></li>
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
                                        <th>Специальность</th>
                                        <th>Вакансии</th>
                                        <th>Резюме</th>
                                        <th>Разница</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $specs=R::getAll("SELECT id, name FROM azamat_spec"); $c = $_GET['city'];
                                    foreach ($specs as $item):
                                        $vacancy_count = R::getAll("SELECT id FROM azamat_vacancy WHERE id_city=? AND id_spec = ?",[$city[0]['id'], $item['id']]);
                                        $rezume_count = R::getAll("SELECT id FROM azamat_rezume WHERE id_city=? AND id_spec = ?",[$city[0]['id'], $item['id']]);
                                    ?>
                                    <tr>
                                        <td><?= $item['name']; ?></td>
                                        <td><?= (count($vacancy_count)>0) ? '<span class="badge badge-success"><a class="text-white" href="morespec?city='.$_GET['city'].'&spec='.$item['id'].'">'.count($vacancy_count)."</a></span>" : count($vacancy_count); ?></td>
                                        <td><?= (count($rezume_count)>0) ? '<span class="badge badge-success"><a class="text-white" href="morespec?city='.$_GET['city'].'&spec='.$item['id'].'">'.count($rezume_count)."</a></span>" : count($rezume_count); ?></td>
                                        <td><?= count($vacancy_count)-count($rezume_count); ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Специальность</th>
                                        <th>Вакансии</th>
                                        <th>Резюме</th>
                                        <th>Разница</th>
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