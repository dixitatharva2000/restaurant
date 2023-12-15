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
          <h1>Restaurant</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Menu</li>
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
                  <h3 class="card-title">Menu</h3>
                </div>
              </div>
              <div class="col-md-2 col-2">
                <div class="float-right">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertform">
                    Add Menu
                  </button>
                </div>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead class="text-center">
                  <tr>
                    <th>Action</th>
                    <th>Category Name</th>
                    <th>SubCategory Name</th>
                    <th>Item Name</th>
                    <th>Status</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Photo</th>
                    <th>Description</th>
                    <th>Created_Date</th>
                    <th>Updated_Date</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  <?php foreach ($menu as $value) { ?>
                    <tr>
                      <td><a href="javascript:void(0)" onclick="editmenu('<?= $value->menu_id; ?>')">
                          <i class="fa fa-pencil-square-o text-success" aria-hidden="true"></i>
                        </a>
                        | <a href="<?= base_url('delete-menu/' . $value->menu_id); ?>"
                          onclick="return confirm('Are you sure want to Remove Menu?');">
                          <i class="fa fa-trash text-danger" aria-hidden="true"></i>

                        </a>
                      </td>
                      <td>
                        <?= $value->category_name; ?>
                      </td>
                      <td>
                        <?= $value->subcategory_name; ?>
                      </td>
                      <td>
                        <?= $value->item_name; ?>
                      </td>
                      <td>
                        <?= $value->status; ?>
                      </td>
                      <td>
                        <?= $value->qty; ?>
                      </td>
                      <td>
                        <?= $value->price; ?>
                      </td>
                      <td>
                        <img src="<?= base_url('uploads/' . $value->photo); ?>" height="100px">
                      </td>
                      <td>
                        <?= $value->description; ?>
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
                    <th>Category Name</th>
                    <th>SubCategory Name</th>
                    <th>Item Name</th>
                    <th>Status</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Photo</th>
                    <th>Description</th>
                    <th>Created_Date</th>
                    <th>Updated_Date</th>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Table</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="form-group col-6">
              <label for="restaurent">Choose Category</label>
              <select name="category_id" class="form-control" onchange="getsubcategory(this.value)">
                <option value="" selected disabled>Select Category</option>
                <?php foreach ($category as $value) {
                  ?>
                  <option value="<?= $value->category_id; ?>">
                    <?= $value->category_name; ?>
                  </option>
                  <?php

                } ?>
              </select>
            </div>


            <div class="form-group col-6">
              <label for="subcategoryname">SubCategory Name</label>
              <select class="form-control" name="subcategory_id" id="subcategory">
                <option value="" selected disabled>Select SubCategory</option>
                <?php foreach ($subcategory as $value) {
                  ?>
                  <option value="<?= $value->subcategory_id; ?>">
                    <?= $value->subcategory_name; ?>
                  </option>
                  <?php

                } ?>
              </select>
            </div>
          </div>


          <div class="row">
            <div class="form-group col-6">
              <label for="item_name">item_name</label>
              <input type="text" id="item_name" class="form-control" placeholder="item_name" name="item_name">
            </div>
            <div class="form-group col-6">
              <label for="status">status</label>
              <select name="status" class="form-control" id="">
                <option value="Active">Active</option>
                <option value="deactive">Deactive</option>

              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label for="qty">qty</label>
              <input type="text" id="item_name" class="form-control" placeholder="qty" name="qty">
            </div>
            <div class="form-group col-6">
              <label for="price">price</label>
              <input type="text" id="price" class="form-control" placeholder="price" name="price" value="price*2">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-12">
              <label for="photo">Photos</label>
              <input type="file" id="photo1" class="form-control" placeholder="photo" name="photo[]" multiple>
            </div>

          </div>

          <div class="row">
            <div class="form-group col-12">
              <label for="description">Description</label>
              <input type="text" id="description" class="form-control" placeholder="description" name="description">
            </div>

          </div>



          <div class="row">
            <div class="form-group col-6">
              <label for="createddate">Created Date</label>
              <input type="date" id="createddate" class="form-control" placeholder="Ente Amount" name="created_date">
            </div>

            <div class="form-group col-6">
              <label for="updateddate">Updated Date</label>
              <input type="date" id="updateddate" class="form-control" name="updated_date">
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" id="btnRefresh" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success btn-sm" onclick="insertdata()">Add Menu</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="editmenu_modal" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
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




  function getsubcategory(category_id) {
    $.ajax({
      url: '<?= base_url('get-subcategory/'); ?>' + category_id,
      success: function (result) {
        $('#subcategory').html(result);
      }
    });
  }
</script>
<?php
include('footer.php');
?>