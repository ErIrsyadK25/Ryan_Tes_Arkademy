<?php
include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="sweetalertpack/sweetalert2.css">
    <link rel="stylesheet" type="text/css" href="sweetalertpack/sweetalert2.min.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="sweetalertpack/sweetalert2.all.js"></script>
    <script src="sweetalertpack/sweetalert2.all.min.js"></script>
    <script src="sweetalertpack/sweetalert2.js"></script>
    <script src="sweetalertpack/sweetalert2.min.js"></script>

    <title>Arkademy Test</title>
</head>

<body>
    <div class="container">
        <center>
            <h2>Arkademy</h2>
            <p>Arkademy Bootcamp</p>
        </center>
        <div class="col-md-12">
            <div class="col-md-11">
            </div>
            <div class="col-md-1">
                <button type="button" id="tambah" class="btn btn-success" data-toggle="modal" onclick="manage_gaji(0,0)">Tambah</button>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Work</th>
                    <th>Salary</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="data_gaji">

            </tbody>
        </table>
    </div>
    <div class="modal fade" id="manage_gaji" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-label">Tambah Gaji</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form class="col-md-12" id="data_gaji">
                            <div class="form-group col-md-12">
                                <label for="recipient-name" class="control-label">Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
<!--                             <div class="form-group col-md-6">
                                <label for="recipient-name" class="control-label">Hobby</label>
                                <select class="form-control" id="upd_3" name="id_work">
                                    <option value="" selected>Hobbies...</option>
                                    <option value="1">Koleksi Tas</option>
                                    <option value="2">InstaStory</option>
                                    <option value="3">UK</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="recipient-name" class="control-label">Category</label>
                                <select class="form-control" id="upd_3" name="id_salary">
                                    <option value="" selected>Categories...</option>
                                    <option value="1">Shopping</option>
                                    <option value="2">Media Sosial</option>
                                    <option value="3">UK</option>
                                </select>
                            </div> -->
                            <div class="form-group col-md-6">
                                <label for="recipient-name" class="control-label">Work</label>
                                <select name="id_work" class="form-control" data-error='Please Enter Work!' required>
                                    <option value="">Work..</option>
                                    <?php
                                    $sql = "SELECT * FROM work";
                                    $query = mysqli_query($koneksi, $sql);
                                    while ($row = mysqli_fetch_object($query)) {
                                        echo "<option value=$row->id>$row->name</option>";
                                    }
                                    ?>
                                </select>
                                <div class="help-blocks with-errors"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="recipient-name" class="control-label">Salary</label>
                                <select name="id_salary" class="form-control" data-error='Please Enter Salary!' required>
                                    <option value="">Salary..</option>
                                    <?php
                                    $sql = "SELECT * FROM salary";
                                    $query = mysqli_query($koneksi, $sql);
                                    while ($row = mysqli_fetch_object($query)) {
                                        echo "<option value=$row->id>$row->salary</option>";
                                    }
                                    ?>
                                </select>
                                <div class="help-blocks with-errors"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="data_gaji()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('.delete-link').on('click',function(){
                var getLink = $(this).attr('href');
                swal({
                        title: 'Alert',
                        text: 'Hapus Data?',
                        html: true,
                        confirmButtonColor: '#d9534f',
                        showCancelButton: true,
                        },function(){
                        window.location.href = getLink
                    });
                return false;
            });
        });
    </script>

    <script>
        var status_manage_gaji;
        var id_gaji;

        function init() {
            $('tbody')[0].innerHTML = "";
            $.ajax({
                method: "GET",
                url: "get.php",
                success: (response) => {
                    var i;

                    for (i = 0; i < response.length; i++) {
                        var bilangan = response[i].salary;
                        var number_string = bilangan.toString(),
                        sisa    = number_string.length % 3,
                        rupiah  = number_string.substr(0, sisa),
                        ribuan  = number_string.substr(sisa).match(/\d{3}/g); 
                        if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                        }
                        $('tbody').append('<tr id="' + response[i].id + '"><td>' + (i + 1) + '</td><td>' + response[i].name + '</td><td>' + response[i].work + '</td><td>' + 'Rp.' + rupiah + '</td><td><button type="button" onclick="SwalDelete(' + response[i].id + ')" class="btn btn-danger delete_gaji"><span class="glyphicon glyphicon glyphicon-trash" aria-hidden="true"></span></button> <button type="button" class="btn btn-primary" onclick="manage_gaji(1, ' + response[i].id + ')"><span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></button></td></tr>');
                    }
                }
            });
        }

        init();

        function data_gaji() {
            if (status_manage_gaji == 1) {
                edit_gaji();
            } else {
                tambah_gaji();
            }
        }

        function manage_gaji(type, id) {
            status_manage_gaji = type;
            if (type == 1) {
                $('#modal-label')[0].innerHTML = "Edit Data";
                id_gaji = id;
                get_gaji(id);
            } else {
                $('#modal-label')[0].innerHTML = "Tambah Data";
                $('input[name=name]').val("");
                $('select[name=id_work]').val("");
                $('select[name=id_salary]').val("");
                $('#manage_gaji').modal('show');
                id_gaji = null;
            }
        }

        function tambah_gaji() {
            $.ajax({
                method: "POST",
                url: "insert.php",
                data: {
                    name: $('input[name=name]').val(),
                    id_work: $('select[name=id_work]').val(),
                    id_salary: $('select[name=id_salary]').val()
                },
                success: (response) => {
                    if (response.success) {
                        $('input[name=name]').val("");
                        $('select[name=id_work]').val("");
                        $('select[name=id_salary]').val("");
                        $('#manage_gaji').modal('hide');
                        swal('Done!', 'Your data has been inserted!','success');
                        init();
                    } else {
                        swal('Oops...', 'Something went wrong with ajax !', 'error');
                    }
                }
            });
        }

        function edit_gaji() {
            $.ajax({
                method: "POST",
                url: "update.php",
                data: {
                    id: id_gaji,
                    name: $('input[name=name]').val(),
                    id_work: $('select[name=id_work]').val(),
                    id_salary: $('select[name=id_salary]').val()
                },
                success: (response) => {
                    if (response.success) {
                        $('input[name=name]').val("");
                        $('select[name=id_work]').val("");
                        $('select[name=id_salary]').val("");
                        $('#manage_gaji').modal('hide');
                        swal('Done!', 'Your data has been updated!','success');
                        init();
                    } else {
                        swal('Oops...', 'Something went wrong with ajax !', 'error');
                    }
                }
            });
        }

        function get_gaji(id) {
            $.ajax({
                method: "GET",
                data: {
                    id: id
                },
                url: "get.php",
                success: (response) => {
                    $('input[name=name]').val(response.name);
                    $('select[name=id_work]').val(response.id_work);
                    $('select[name=id_salary]').val(response.id_salary);
                    $('#manage_gaji').modal('show');
                }
            });
        }

        function hapus_gaji(id) {
            $.ajax({
                method: "POST",
                data: {
                    id: id
                },
                url: "delete.php",
                success: (response) => {
                    if (response.success) {
                        init();
                    } else {
                        console.log(response.message);
                    }
                }
            });
        }
        
        $(document).on('click', '#delete_gaji', function(e){
            
            var id = $(this).data('id');
            SwalDelete(id);
            e.preventDefault();
        });
        
    
    function SwalDelete(id){
        
        swal({
            title: 'Are you sure?',
            text: "It will be deleted permanently!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,
              
            preConfirm: function() {
              return new Promise(function(resolve) {
                   
                 $.ajax({
                    url: 'delete.php',
                    type: 'POST',
                    data: {id : id},
                    dataType: 'json'
                 })
                 .done(function(response){
                    swal('Done!', 'Your data has been deleted!','success');
                    init();
                 })
                 .fail(function(){
                    swal('Oops...', 'Something went wrong with ajax !', 'error');
                 });
              });
            },
            allowOutsideClick: false              
        }); 
        
    }
    </script>
</body>

</html>