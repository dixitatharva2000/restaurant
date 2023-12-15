<?php
include('header.php');
$session = session();
?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Restaurent</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">SubCategory</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <?= $session->getFlashdata('delete'); ?>
      <?= $session->getFlashdata('create'); ?>
      <?= $session->getFlashdata('update'); ?>
      <div class="row">
        <div class="col-12">
          <!-- /.card -->
          <div class="card">
            <div class="row card-header">
              <div class="col-md-10 col-10">
                <div class="">
                  <h3 class="card-title">Sub Category</h3>
                </div>
              </div>
              <div class="col-md-2 col-2">
                <div class="float-right">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertform">
                    Add SubCategory
                  </button>
                </div>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="text-center">
                  <tr>
                    <th>Action</th>
                    <th>subcategory_name</th>
                    <th>category_name </th>
                    <th>photo </th>
                    <th>description</th>
                    <th>Status</th>
                    <th>created_date</th>
                    <th>updated_date</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  <?php foreach ($subcategory as $value) { ?>
                    <tr>
                      <td>
                        <a href="javascript:void(0)" onclick="editsubcategory('<?= $value->subcategory_id; ?>')">
                          <i class="fa fa-pencil-square-o text-success" aria-hidden="true"></i>
                        </a>
                        | <a href="<?= base_url('delete-subcategory/' . $value->subcategory_id); ?>"
                          onclick="return confirm('Are you sure want to Remove SubCategory?');">
                          <i class="fa fa-trash text-danger" aria-hidden="true"></i>

                        </a>
                      </td>
                      <td>
                        <?= $value->subcategory_name; ?>
                      </td>   
                      <td>
                        <?= $value->category_name; ?>
                      </td>                   
                      <td>
                        <img src="<?=base_url('uploads/'.$value->photo);?>"width="100px">
                      </td>
                      <td>
                        <?= $value->description; ?>
                      </td>
                      <td>
                        <?= $value->status; ?>
                      </td>
                     
                      <td>
                        <?= $value->created_date; ?>
                      </td>
                      <td>
                        <?= $value->updated_date; ?>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot class="text-center">
                  <tr>
                  <th>Action</th>
                    <th>subcategory_name</th>
                    <th>category_name</th>
                    <th>photo </th>
                    <th>description </th>
                    <th>Status</th>
                    <th>created_date</th>
                    <th>updated_date</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="insertform" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add SubCategory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
          <div class="row">
            
          <div class="form-group col-6">
              <label for="subcategory_name">subcategory_name</label>
              <input type="text" id="subcategory_name" class="form-control" name="subcategory_name">
            </div>


            <div class="form-group col-6">
              <label for="category_name">category_name</label>
              <select name="category_id" class="form-control" id="" >
                <option value="">Select Category</option>
                <?php foreach ($category as $value) { ?>

                  <option value="<?= $value->category_id; ?>">
                    <?= $value->category_name; ?>
                  </option>
                <?php

                } ?>
              </select>
            </div>
          </div>

          <div class="row">
            
            <div class="form-group col-6">
            <label for="photo">photo</label>
              <input type="file" id="photo" class="form-control" name="photo">
            </div>

            <div class="form-group col-6">
              <label for="status">status</label>
              <select name="status" class="form-control" id="">
                <option value="Active">Active</option>
                <option value="Closed">Closed</option>
                <option value="Under Renovation">Under Renovation</option>
              </select>
            </div>

          </div>   
        
          <div class="row">
          <div class="form-group col-12">
                <label for="item_description">description</label>
                <textarea name="description" id="description" rows="3" class="form-control"
                placeholder="description"></textarea>
            </div>
          </div> 

          <div class="row">
            <div class="form-group col-6">
              <label for="created_date">created_date</label>
              <input type="date" id="created_date" class="form-control" name="created_date">
            </div>
            <div class="form-group col-6">
              <label for="updated_date">updated_date</label>
              <input type="date" id="updated_date" class="form-control" name="updated_date">
            </div>
          </div>

         
         

         

          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success btn-sm" onclick="insertdata()">Add SubCategory</button>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="editsubcategory_modal" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit SubCategory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="formdata">

      </div>
    </div>
  </div>
</div>


<script>
  document.addEventListener('DOMContentLoaded', function () {
    var alertElem = document.getElementById('sessionAlert');
    if (alertElem) {
      setTimeout(function () {
        alertElem.style.display = 'none';
      }, 2000);
    }
  });
</script>
<?php
include('footer.php');
?>