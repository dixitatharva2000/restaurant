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
          <h1>Franchise</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Franchise</li>
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
                  <h3 class="card-title">Franchises</h3>
                </div>
              </div>
              <div class="col-md-2 col-2">
                <div class="float-right">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertform">
                    Add Franchise
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
                    <th>Franchise Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>Current Status</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  <?php foreach ($franchise as $value) { ?>
                    <tr>
                      <td><a href="javascript:void(0)" onclick="editfranchise('<?= $value->franchise_id; ?>')">
                          <i class="fa fa-pencil-square-o text-success" aria-hidden="true"></i>
                        </a>
                        | <a href="<?= base_url('delete-franchise/' . $value->franchise_id); ?>"
                          onclick="return confirm('Are you sure want to Remove Franchise?');">
                          <i class="fa fa-trash text-danger" aria-hidden="true"></i>

                        </a>
                      </td>
                      <td>
                        <?= $value->restaurent_name; ?>
                      </td>
                      <td>
                        <?= $value->franchise_name; ?>
                      </td>
                      <td>
                        <?= $value->franchise_phone; ?>
                      </td>
                      <td>
                        <?= $value->franchise_email; ?>
                      </td>
                      <td>
                        <?= $value->franchise_address; ?>
                      </td>
                      <td>
                        <?= $value->franchise_current_status; ?>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot class="text-center">
                  <tr>
                    <th>Action</th>
                    <th>Restaurent Name</th>
                    <th>Franchise Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Location</th>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Franchise</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="form-group col-6">
              <label for="restaurent">Choose Restaurant</label>
              <select name="restaurent_id" class="form-control" id="">
                <?php foreach ($restaurent as $value) {
                  if ($value->franchise === 'Yes') {
                    ?>
                    <option value="<?= $value->restaurent_id; ?>">
                      <?= $value->restaurent_name; ?>
                    </option>
                    <?php
                  }
                } ?>
              </select>
            </div>



            <div class="form-group col-6">
              <label for="franchisename">Franchise Name</label>
              <input type="text" id="franchisename" class="form-control" name="franchise_name"
                placeholder="Enter Franchise Name">
            </div>

            <div class="form-group col-6">
              <label for="ownername">Owner's Name</label>
              <input type="text" id="ownername" class="form-control" placeholder="Enter Owner's Name"
                name="franchise_owner_name">
            </div>

            <div class="form-group col-6">
              <label for="openingdate">Opening Date</label>
              <input type="date" id="openingdate" class="form-control" name="franchise_opening_date">
            </div>

            <div class="form-group col-6">
              <label for="contact">Contact Number</label>
              <input type="text" id="contact" class="form-control" placeholder="Enter Contact Number"
                name="franchise_phone">
            </div>
            <div class="form-group col-6">
              <label for="email">Email</label>
              <input type="text" id="email" class="form-control" placeholder="Enter Email-ID" name="franchise_email">
            </div>
          </div>


          <div class="row">
            <div class="form-group col-6">
              <label for="monthlyrevenue">Monthly Revenue</label>
              <input type="text" id="monthlyrevenue" class="form-control" placeholder="Ente Amount"
                name="franchise_monthly_revenue">
            </div>

            <div class="form-group col-6">
              <label for="monthlyexpenses">Monthly Expenses</label>
              <input type="text" id="monthlyexpenses" class="form-control" placeholder="Ente Amount"
                name="franchise_monthly_expenses">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label for="agreementdate">Agreement Date</label>
              <input type="date" id="agreementdate" class="form-control" name="franchise_agreement_date">
            </div>

            <div class="form-group col-6">
              <label for="renewaldate">Renewal Date</label>
              <input type="date" id="renewaldate" class="form-control" name="franchise_renewal_date">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-12">
              <label for="currentstatus">Current Status</label>
              <select name="franchise_current_status" class="form-control" id="">
                <option value="Active">Active</option>
                <option value="Closed">Closed</option>
                <option value="Under Renovation">Under Renovation</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="Location">Location</label>
            <textarea name="franchise_address" id="Location" rows="3" class="form-control"
              placeholder="Address"></textarea>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success btn-sm" onclick="insertdata()">Add Franchise</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="editfranchise_modal" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Franchise</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="form-data">

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