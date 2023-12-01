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
            <li class="breadcrumb-item active">Restaurent</li>
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
                  <h3 class="card-title">Restaurents</h3>
                </div>
              </div>
              <div class="col-md-2 col-2">
                <div class="float-right">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertform">
                    Add Restaurent
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
                    <th>Restaurent Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>Franchise</th>
                    <th>Current Status</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  <?php foreach ($restaurent as $value) { ?>
                    <tr>
                      <td><a href="javascript:void(0)" onclick="editrestaurent('<?= $value->restaurent_id; ?>')">
                          <i class="fa fa-pencil-square-o text-success" aria-hidden="true"></i>
                        </a>
                        | <a href="<?= base_url('delete/' . $value->restaurent_id); ?>"
                          onclick="return confirm('Are you sure want to Remove Restaurent?');">
                          <i class="fa fa-trash text-danger" aria-hidden="true"></i>

                        </a>
                      </td>
                      <td>
                        <?= $value->restaurent_name; ?>
                      </td>
                      <td>
                        <?= $value->phone; ?>
                      </td>
                      <td>
                        <?= $value->email; ?>
                      </td>
                      <td>
                        <?= $value->address; ?>
                      </td>
                      <td>
                        <?= $value->franchise; ?>
                      </td>
                      <td>
                        <?= $value->current_status; ?>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot class="text-center">
                  <tr>
                    <th>Action</th>
                    <th>Restaurent Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>Franchise</th>
                    <th>Current Status</th>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Restaurent</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="form-group col-6">
              <label for="restaurentname">Restaurent Name</label>
              <input type="text" id="restaurentname" class="form-control" placeholder="Enter Restaurent Name"
                name="restaurent_name">
            </div>

            <div class="form-group col-6">
              <label for="openingdate">Opening Date</label>
              <input type="date" id="openingdate" class="form-control" name="opening_date">
            </div>

            <div class="form-group col-6">
              <label for="ownername">Owner Name</label>
              <input type="text" id="ownername" class="form-control" placeholder="Enter Owner's Name" name="owner_name">
            </div>

            <div class="form-group col-6">
              <label for="contact">Contact Number</label>
              <input type="text" id="contact" class="form-control" placeholder="Enter Contact Number" name="phone">
            </div>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" class="form-control" placeholder="Enter Email-ID" name="email">
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label for="monthlyrevenue">Monthly Revenue</label>
              <input type="text" id="monthlyrevenue" class="form-control" placeholder="Ente Amount"
                name="monthly_revenue">
            </div>

            <div class="form-group col-6">
              <label for="monthlyexpenses">Monthly Expenses</label>
              <input type="text" id="monthlyexpenses" class="form-control" placeholder="Ente Amount"
                name="monthly_expenses">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label for="agreementdate">Agreement Date</label>
              <input type="date" id="agreementdate" class="form-control" name="agreement_date">
            </div>

            <div class="form-group col-6">
              <label for="renewaldate">Renewal Date</label>
              <input type="date" id="renewaldate" class="form-control" name="renewal_date">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-6">
              <label for="franchise">Franchise or Not?</label>
              <select name="franchise" class="form-control" id="">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="form-group col-6">
              <label for="currentstatus">Current Status</label>
              <select name="current_status" class="form-control" id="">
                <option value="Active">Active</option>
                <option value="Closed">Closed</option>
                <option value="Under Renovation">Under Renovation</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="Location">Location</label>
            <textarea name="address" id="Location" rows="3" class="form-control" placeholder="Address"></textarea>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success btn-sm" onclick="insertdata()">Add Restaurent</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="editrestaurent_modal" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Restaurent</h5>
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